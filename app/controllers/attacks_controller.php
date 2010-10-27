<?php
class AttacksController extends AppController {

	var $name = 'Attacks';
	var $helpers = array('Facebook');
	var $uses = array('Move', 'Attack');

	function index($id = null) {
	  if (!empty($id)) {
	    $user = $this->User->findById($id);
        $this->User->create($user);
	  }

	  $battles = $this->User->battles();
	  
	  if (empty($battles)) {
	    $this->Session->setFlash("Todavía no has combatido con nadie ¿Porque no atacas a tus amigos?");
        $this->redirect(array('action' => 'add'));
	  }
	  
	  $this->set('battles', $battles);
	}

	function add() {
	  if (!empty($this->data)) {
	    $hits = array();
	    $misses = array();

	    foreach($this->data['Attack']['defending_user_id'] as $id) {
	      $attack = $this->User->attack($id, $this->data['Attack']['move_id']);
	      if ($attack['Attacks']['hit'] == 1) {
	        $hits[] = $attack;
	      } else {
	        $misses[] = $attack;
	      }
	      
	      //publish the attack to facebook
          $fb_user = $this->facebook->api($id);
          //get the movement
          $move = $this->Move->findById($this->data['Attack']['move_id']);
    
	      $this->facebook->api('/me/feed', 'POST', array(
	      	'link' => 'http://apps.facebook.com/ninja_moves',
	        'name' => '¡Devuélvelo!',
	      	'message' => 'ha atacado a ' . $fb_user['name'] . ' con ' . $move['Move']['name'],
	        'caption' => 'Golpes a porrillo'
	      ));
	    }

	    $this->Session->setFlash(
				'Tu ataque ha resultado en ' . count($hits) . ' ' .
	    (count($hits) == 1 ? 'golpe' : 'golpes') . ' y ' . count($misses) . ' ' .
	    (count($misses) == 1 ? 'fallo' : 'fallos')
	    , true);
	     
	    $this->redirect(array('action' => 'add'));
	  }

	  //get the friends
	  $fbFriends = $this->facebook->api('/me/friends');

	  //refactor friends array
	  foreach ($fbFriends['data'] as $friend) {
	    $friends[$friend['id']] = $friend['name'];
	  }

	  $moves = $this->Attack->Move->find('list');
	  $this->set(compact('moves', 'friends'));
	}
}
?>
<?php
class AttacksController extends AppController {

	var $name = 'Attacks';

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
			}

			$this->Session->setFlash(__(
				'Your attack resulted in ' . count($hits) . ' ' .
			  (count($hits) == 1 ? 'hit' : 'hits') . ' and ' . count($misses) . ' ' . 
			  (count($hits) == 1 ? 'miss' : 'misses')
			, true));
			
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
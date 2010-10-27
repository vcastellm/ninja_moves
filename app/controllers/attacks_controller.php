<?php
class AttacksController extends AppController {

	var $name = 'Attacks';

	function add() {
		if (!empty($this->data)) {
			foreach($this->data['Attack']['defending_user_id'] as $id) {
			  $this->User->attack($id, $this->data['Attack']['move_id']);
			}
      
			$this->Session->setFlash(__('Succesful attack', true));
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
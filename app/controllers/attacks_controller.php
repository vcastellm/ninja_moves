<?php
class AttacksController extends AppController {

	var $name = 'Attacks';

	function index() {
		$this->Attack->recursive = 0;
		$this->set('attacks', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid attack', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('attack', $this->Attack->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			foreach($this->data['Attack']['defending_user_id'] as $id) {
			  $this->User->attack($id, $this->data['Attack']['move_id']);
			}
      
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

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid attack', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Attack->save($this->data)) {
				$this->Session->setFlash(__('The attack has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attack could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Attack->read(null, $id);
		}
		$attackingUsers = $this->Attack->AttackingUser->find('list');
		$defendingUsers = $this->Attack->DefendingUser->find('list');
		$moves = $this->Attack->Move->find('list');
		$this->set(compact('attackingUsers', 'defendingUsers', 'moves'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for attack', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Attack->delete($id)) {
			$this->Session->setFlash(__('Attack deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Attack was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
<?php
class User extends AppModel {
	var $name = 'User';
	var $displayField = 'facebook_id';
	var $validate = array(
		'id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'facebook_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	var $hasMany = array(
		'Attacks' => array(
			'className' => 'Attack',
			'foreignKey' => 'attacking_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Defenses' => array(
			'className' => 'Attack',
			'foreignKey' => 'defending_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
	
	function attack($otherUser, $move) {
	  $this->Attacks->create(array(
	    'defending_user' => $otherUser,
	    'move' => $move
	  ));
	}
	
	
}
?>
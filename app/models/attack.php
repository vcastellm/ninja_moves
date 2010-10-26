<?php
class Attack extends AppModel {
	var $name = 'Attack';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'AttackingUser' => array(
			'className' => 'User',
			'foreignKey' => 'attacking_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DefendingUser' => array(
			'className' => 'User',
			'foreignKey' => 'defending_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Move' => array(
			'className' => 'Move',
			'foreignKey' => 'move_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>
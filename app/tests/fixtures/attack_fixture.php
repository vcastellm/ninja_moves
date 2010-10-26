<?php
/* Attack Fixture generated on: 2010-10-26 15:10:55 : 1288106215 */
class AttackFixture extends CakeTestFixture {
	var $name = 'Attack';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'attacking_user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'defending_user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'move_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'attacking_user_id' => 1,
			'defending_user_id' => 1,
			'move_id' => 1,
			'created' => '2010-10-26 15:16:55',
			'modified' => '2010-10-26 15:16:55'
		),
	);
}
?>
<?php
/* Move Test cases generated on: 2010-10-26 15:10:11 : 1288106051*/
App::import('Model', 'Move');

class MoveTestCase extends CakeTestCase {
	var $fixtures = array('app.move');

	function startTest() {
		$this->Move =& ClassRegistry::init('Move');
	}

	function endTest() {
		unset($this->Move);
		ClassRegistry::flush();
	}

}
?>
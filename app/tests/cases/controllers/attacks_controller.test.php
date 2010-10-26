<?php
/* Attacks Test cases generated on: 2010-10-26 15:10:58 : 1288108498*/
App::import('Controller', 'Attacks');

class TestAttacksController extends AttacksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class AttacksControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.attack', 'app.user', 'app.move');

	function startTest() {
		$this->Attacks =& new TestAttacksController();
		$this->Attacks->constructClasses();
	}

	function endTest() {
		unset($this->Attacks);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>
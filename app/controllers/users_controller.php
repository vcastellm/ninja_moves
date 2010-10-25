<?php
class UsersController extends AppController {

	var $name = 'Users';
  
	function login() {
	  $this->redirect($this->facebook->getLoginUrl(array('fbconnect' => 0)));
	  
	  var_dump($this->facebook->getLoginUrl(array('fbconnect' => 0)));
	}
}
?>
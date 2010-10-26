<?php
class UsersController extends AppController {

	var $name = 'Users';
  
	function login() {
	  $this->validateUser();
	}
	
	function validateUser() {
	  // set Auth to a convenience variable
    $Auth = $this->Auth;
    
    $fb = $this->facebook;
    $session = $fb->getSession();
    
    //means that we are not in facebook
    if (empty($session)) {
      $this->redirect($this->facebook->getLoginUrl(array('fbconnect' => 0)));
    }
    
	  // check if the user already has an account
    // User is logged in but doesn't have a 
    if ($Auth->user()) {
      $this->hasAccount = true;
      $this->User->id = $Auth->user('id');
      if (!$this->User->field('facebook_id')) {
        $this->User->saveField('facebook_id', $session['uid']);
      }
    } 
    else {
      // attempt to find the user by their facebook id
      $user = $this->User->findByFacebookId($session['uid']);
      
      //if we have a user, set hasAccount
      if (!empty($user)) {
        $this->hasAccount = true;
      }
      //create the user if we don't have one
      elseif (empty($user)) {
        $user[$this->User->alias]['facebook_id'] = $session['uid'];
        $user[$this->User->alias][$Auth->fields['password']] = $Auth->password('disabled');
        $this->hasAccount = ($this->User->save($user, array('validate' => false)));
      }
      //Login user if we have one
      if ($user) {
        $Auth->fields = array('username' => 'facebook_id', 'password' => $Auth->fields['password']);    		
        $Auth->login($user);
      }
    }
	}
}
?>
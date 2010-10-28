<?php
class InvitationsController extends AppController {
  var $name = 'Invitations';
  var $uses = array();
  
  function index() {
  }
  
  function add() {
    $sentToIds = array();
    
    //get the friends invited
    if (isset($this->params['form']['ids'])) {
      $sentToIds = $this->params['form']['ids'];
    }
    
    $this->set('sentToIds', $sentToIds);
  }
}
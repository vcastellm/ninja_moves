<?php 
class FacebookHelper extends AppHelper {
  var $helpers = array('Session');
  
  function fb_name($id) {
    //get the facebook object
    $fb = $this->Session->read('Facebook.facebook');
    
    //request the user name
    $fb_user = $fb->api($id);
    
    return $fb_user['name']; 
  }
}
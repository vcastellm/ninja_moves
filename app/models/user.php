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
	    'attacking_user_id' => $this->id,
	    'defending_user_id' => $this->for_id($otherUser),
	    'move_id' => $move
	  ));
	  
	  return $this->Attacks->save();
	}
	
	
	function battles() {
	  $this->Attack->find('all', array(
	    'conditions' => array(
	    	"OR" => array (
	    		'Attack.attacking_user_id' => $this->id,
	  			'Attack.defending_user_id' => $this->id,
	      )
	    ),
	    'order' => 'Attacks.created desc'
	  ));
	}
	
	function for_id($id) {
	  // attempt to find the user by their facebook id
    $user = $this->findByFacebookId($id);
    
    //if not in the db create new one
    if (empty($user)) {
      $user = new User();
      $user->set('facebook_id', $id);
      $user->save();
      return $user->id;  
    } else {
      return $user['User']['id'];
    }
	}
	
}
?>
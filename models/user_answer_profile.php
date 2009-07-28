<?php
class UserAnswerProfile extends AppModel {

	var $name = 'UserAnswerProfile';
	var $validate = array(
		'user_id' => array('numeric'),
		'avatar_option' => array('numeric'),
		'email' => array('email'),
		'show_link_profile' => array('numeric'),
		'allow_contact' => array('numeric'),
		'allow_fans' => array('numeric'),
		'notify_question_answered' => array('numeric'),
		'notify_friend_asks' => array('numeric'),
		'notify_new_fan' => array('numeric'),
		'subscribe_newsletter' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>
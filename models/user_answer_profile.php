<?php
class UserAnswerProfile extends AnswersAppModel {

	var $name = 'UserAnswerProfile';
	var $validate = array(
		'avatar_option' => array('numeric'),
		'show_link_profile' => array('boolean'),
		'allow_contact' => array('boolean'),
		'allow_fans' => array('boolean'),
		'notify_question_answered' => array('boolean'),
		'notify_friend_asks' => array('boolean'),
		'notify_new_fan' => array('boolean'),
		'subscribe_newsletter' => array('boolean'),
		'is_public' => array('boolean')
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
	
	var $genders = array(
		'Male' => 'Male',
		'Female' => 'Female'
	);

}
?>
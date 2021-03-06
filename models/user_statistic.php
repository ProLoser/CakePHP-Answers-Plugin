<?php
class UserStatistic extends AnswersAppModel {

	var $name = 'UserStatistic';
	var $validate = array(
		'user_id' => array('numeric'),
		'level' => array('numeric'),
		'points' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'UserLevel' => array(
			'className' => 'Answers.UserLevel'
		)
	);
	
	function afterSave($created) {
		
		if ($created) {
			
			// Give user registration points
			$this->User->assignPoints('register', $this->data['UserStatistic']['user_id'], $this->id);
			
		}
		
	}

}
?>
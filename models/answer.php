<?php
class Answer extends AnswersAppModel {

	var $name = 'Answer';
	var $validate = array(
		'answer' => array('notEmpty'),
		'user_id' => array(
			'You have reached the maximum number of answers allowed per day' => 'isUnderLimit'
		),
	);
	var $order = array('Answer.created DESC');

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Question' => array(
			'className' => 'Answers.Question',
			'foreignKey' => 'question_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
		)
	);
	
	var $actsAs = array(
		'AnswersInstaller'
	);
	
	var $hasOne = array(
		'BestAnswer',
	);
	
	function afterSave($created) {
		$this->assignPoints('answer', $this->data['Answer']['user_id'], $this->id);
	}
}
?>
<?php
class Answer extends AnswersAppModel {

	var $name = 'Answer';
	var $validate = array(
		'answer' => array('notempty'),
		'points' => array('numeric')
	);
	var $order = array('created DESC');

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
	
	var $hasOne = array(
		'BestAnswer',
	);

}
?>
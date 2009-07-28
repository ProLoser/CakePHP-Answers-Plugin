<?php
class Topic extends AnswersAppModel {

	var $name = 'Topic';
	var $validate = array(
		'name' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'unique' => true,
		),
		'Question' => array(
			'className' => 'Answers.Question',
			'joinTable' => 'questions_topics',
			'foreignKey' => 'topic_id',
			'associationForeignKey' => 'question_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
?>
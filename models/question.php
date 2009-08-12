<?php
class Question extends AnswersAppModel {

	var $name = 'Question';
	var $validate = array(
		'subject' => array('notempty'),
		'message' => array('notempty'),
		'answer_count' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasOne = array(
		'BestAnswer' => array(
			'className' => 'Answers.BestAnswer',
		),
	);
	
	var $belongsTo = array(
		'User',
		'Category' => array(
			'className' => 'Answers.Category',
		)
	);

	var $hasMany = array(
		'Answer' => array(
			'className' => 'Answers.Answer',
			'dependent' => true,
		),
		'FavoriteQuestion' => array(
			'dependent' => true,
		),
	);

	var $hasAndBelongsToMany = array(
		'Tag' => array(
			'className' => 'Answers.Tag',
			'joinTable' => 'questions_tags',
			'foreignKey' => 'question_id',
			'associationForeignKey' => 'tag_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Topic' => array(
			'className' => 'Answers.Topic',
			'joinTable' => 'questions_topics',
			'foreignKey' => 'question_id',
			'associationForeignKey' => 'topic_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
	);

}
?>
<?php
class Topic extends AppModel {

	var $name = 'Topic';
	var $validate = array(
		'name' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
		'Consultant' => array(
			'className' => 'Consultant',
			'joinTable' => 'consultants_topics',
			'foreignKey' => 'topic_id',
			'associationForeignKey' => 'consultant_id',
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
		'Question' => array(
			'className' => 'Question',
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
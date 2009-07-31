<?php
class Category extends AnswersAppModel {

	var $name = 'Category';
	var $actsAs = array('Tree');
	var $validate = array(
		'name' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Question' => array(
			'className' => 'Answers.Question',
			'foreignKey' => 'category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'Consultant' => array(
			'unique' => true,
		),
		'Question' => array(
			'unique' => true,
		)
	);

}
?>
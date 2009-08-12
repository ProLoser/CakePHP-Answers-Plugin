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
		)
	);

	var $hasAndBelongsToMany = array(
		'Consultant' => array(
			'unique' => true,
		)
	);

}
?>
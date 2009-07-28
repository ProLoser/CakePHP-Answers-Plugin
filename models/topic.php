<?php
class Topic extends AnswersAppModel {

	var $name = 'Topic';
	var $validate = array(
		'name' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
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
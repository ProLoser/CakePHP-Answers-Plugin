<?php
class PointEvent extends AnswersAppModel {

	var $name = 'PointEvent';
	var $validate = array(
		'description' => array('notempty'),
		'model' => array('notempty'),
		'points' => array('numeric'),
		'code' => array('alphanumeric'),
	);
	
	var $hasMany = array(
		'Point' => array(
			'className' => 'Answers.Point',
		)
	);

}
?>
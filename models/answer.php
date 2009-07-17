<?php
class Answer extends AppModel {

	var $name = 'Answer';
	var $validate = array(
		'answer' => array('notempty'),
		'points' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'question_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => 'points',
			'counterQuantity' => 'points',
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => 'points',
			'counterQuantity' => 'points',
		)
	);

}
?>
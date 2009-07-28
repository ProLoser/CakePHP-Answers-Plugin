<?php
class Point extends AppModel {

	var $name = 'Point';
	var $validate = array(
		'event_id' => array('numeric'),
		'user_id' => array('numeric'),
		'model' => array('notempty'),
		'foreign_key' => array('numeric'),
		'points' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'event_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>
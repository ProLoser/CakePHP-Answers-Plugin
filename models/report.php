<?php
class Report extends AppModel {

	var $name = 'Report';
	var $validate = array(
		'user_id' => array('numeric'),
		'model' => array('notempty'),
		'foreign_key' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
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
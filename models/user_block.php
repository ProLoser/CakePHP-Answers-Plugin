<?php
class UserBlock extends AppModel {

	var $name = 'UserBlock';
	var $validate = array(
		'user_id' => array('numeric'),
		'friend_id' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'User',
		'Friend' => array(
			'className' => 'Friend',
			'foreignKey' => 'friend_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>
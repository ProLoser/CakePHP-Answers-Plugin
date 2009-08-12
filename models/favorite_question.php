<?php
class FavoriteQuestion extends AppModel {

	var $name = 'FavoriteQuestion';
	var $validate = array(
		'question_id' => array('numeric'),
		'user_id' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Question',
		'User'
	);

}
?>
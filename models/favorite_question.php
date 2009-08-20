<?php
class FavoriteQuestion extends AppModel {

	var $name = 'FavoriteQuestion';
	var $validate = array(
		'user_id' => array(
			'You have reached the maximum number of answers allowed per day' => 'isUnderLimit'
		),
	);
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Question' => array(
			'className' => 'Answers.Question',
		),
		'User'
	);
	
	var $actsAs = array(
		'AnswersInstaller'
	);
/*	
	function afterSave() {
		$this->assignPoints('addanswer', $this->data['Answer']['user_id'], $this->id);
	}
	function  afterDelete() {
		echo $this->id;
	}
*/
}
?>
<?php
class FavoriteQuestion extends AppModel {

	var $name = 'FavoriteQuestion';
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Question' => array(
			'className' => 'Answers.Question',
		),
		'User'
	);
	
	function beforeSave() {
		$data['FavoriteQuestion.question_id'] = $this->data['FavoriteQuestion']['question_id'];
		$data['FavoriteQuestion.user_id'] = $this->data['FavoriteQuestion']['user_id'];
		if ($this->find('all', array('conditions'=>$data))) {
			return false;
		} else {
			return true;
		}
	}

}
?>
<?php
class Point extends AnswersAppModel {

	var $name = 'Point';
	var $validate = array(
		'point_event_id' => array('numeric'),
		'user_answer_Profile_id' => array('numeric'),
		//'model' => array('notempty'),
		//'foreign_key' => array('numeric'),
		'points' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'User',
		'PointEvent' => array(
			'className' => 'Answers.PointEvent',
		)
	);
	
	function afterSave($created) {
		if ($created) {			
			$this->User->UserStatistic->updateAll(
				array('UserStatistic.points' => 'UserStatistic.points + '.$this->data['Point']['points']), 
				array('UserStatistic.user_id' => $this->id)
			);
		}
	}
	
		
	function beforeDelete() {
	}

}
?>
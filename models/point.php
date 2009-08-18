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
	
	// Action checks (login once per day, 50 thumb up max, register) should be performed in the controller actions only
	// Model is stored in POINT EVENT DEFINITION
	// model_foreign_key is used in conjunction to show which record from the related model caused the points
	
	function assign($code, $userId, $foreignKey = null) {
		if (!$event = $this->PointEvent->find('first', array(
			'recursive' => -1, 
			'conditions' => array('PointEvent.code' => $code))
		)) {
			return false;
		}
		$data['Point'] = array(
			'point_event_id' => $event['Event']['id'],
			'user_id' => $userId,
			'points' => $event['Event']['points'],
		);
		if ($foreignKey) {
			$data['Point']['model_foreign_key'] = $foreignKey;
		}
		if ($this->save($data)) {
			return true;
		} else {
			return false;
		}
	}

}
?>
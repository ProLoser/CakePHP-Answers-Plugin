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
	function event($code, $userId, $foreignKey = null) {
		// Figure out which point event we're using
		$event = $this->PointEvent->find('first', array('conditions' => array(
			'PointEvent.code' => $code
		)));
		
		// Check the point event to see if the user has permission to continue gaining points
		if () {
			// Trigger the creation of the points record
			if ($response = $this->assign($code, $foreignKey, $userId)){
				return $response;
			} else {
				return 'There was an error assigning the points';
			}
		} else {
			return 'Your level has met it\' maximum quota for the day. Please try again tomorrow';
		}
	}
	
	function assign($code, $userId, $foreignKey = null) {
		
	}

}
?>
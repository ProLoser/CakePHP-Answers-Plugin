<?php
class UserLevel extends AppModel {

	var $name = 'UserLevel';
	var $validate = array(
		'name' => array('notempty'),
		'from_points' => array('numeric')
	);
	
	var $hasMany = array(
		'UserStatistic' => array(
			'className' => 'Answers.UserStatistic',
		)
	);
	
	function checkLimit($model, $userId) {
		$userLevel = $this->UserStatistic->find('first', array(
			'conditions'=>array(
				'UserStatistic.user_id' => $userId,
			),
			'contain' => array(
				'UserLevel'
			)
		));
		
		$count = $this->UserStatistic->User->{$model}->find('count', array('conditions'=>array(
			$model.'.user_id' => $userId,
			$model.'.created > ' => date('Y-m-d g:i:s', strtotime('-1 day'))
		)));
		
		return ($count < $userLevel['UserLevel'][Inflector::underscore($model).'_limit']);
	}

}
?>
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
	
	function checkLimitations($model, $userId) {
		$userLevel = $this->UserStatistic->find('first', array('conditions'=>array(
			'UserStatistic.user_id' => $userId,
			'UserLevel.id' => 'UserStatistic.user_level_id',
		)));
		
		$count = $this->UserStatistic->User->{$model}->find('count', array('conditions'=>array(
			'user_id' => $userId,
			$model.'.created > ' => date('Y-m-d g:i:s', strtotime('-1 day'))
		)));
		if ($count < $userLevel['UserLevel'][Inflector::underscore($model).'_limit']) {
			return true;
		} else {
			return false;
		}
	}

}
?>
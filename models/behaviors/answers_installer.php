<?php
/* SVN FILE: $Id: tree.php 8120 2009-03-19 20:25:10Z gwoo $ */
/**
 * Tree behavior class.
 *
 * Enables a model object to act as a node-based tree.
 *
 * PHP versions 4 and 5
 *
 * CakePHP :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2006-2008, Cake Software Foundation, Inc.
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2006-2008, Cake Software Foundation, Inc.
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP Project
 * @package       cake
 * @subpackage    cake.cake.libs.model.behaviors
 * @since         CakePHP v 1.2.0.4487
 * @version       $Revision: 8120 $
 * @modifiedby    $LastChangedBy: gwoo $
 * @lastmodified  $Date: 2009-03-19 13:25:10 -0700 (Thu, 19 Mar 2009) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Tree Behavior.
 *
 * Enables a model object to act as a node-based tree. Using Modified Preorder Tree Traversal
 * 
 * @see http://en.wikipedia.org/wiki/Tree_traversal
 * @package       cake
 * @subpackage    cake.cake.libs.model.behaviors
 */
class AnswersInstallerBehavior extends ModelBehavior {

/**
 * Errors
 *
 * @var array
 */
	var $errors = array();
/**
 * Defaults
 *
 * @var array
 * @access protected
 */
	var $_defaults = array();
/**
 * User Model
 *
 * @var array
 * @access protected
 */
	var $userModel = false;
	
/**
 * User Model
 *
 * @var array
 * @access protected
 */
	var $triggers = array();

/**
 * User Model
 *
 * @var array
 * @access protected
 */	
	var $relationships = array(
		'hasMany'=> array(
			'Answer' => array('className' => 'Answers.Answer'),				
			'Question'=> array('className' => 'Answers.Question'),
			'Report'=> array(
				'className' => 'Answers.Report',
				'dependent' => true
			),
			'Point'=> array(
				'className' => 'Answers.Point',
				'dependent' => true
			),
			'FavoriteQuestion'=> array(
				'className' => 'Answers.FavoriteQuestion',
				'dependent' => true
			)
		),
		'hasOne' => array(
			'UserAnswerProfile'=> array(
				'className' => 'Answers.UserAnswerProfile',
				'dependent' => true
			),
			'UserStatistic'=> array(
				'className' => 'Answers.UserStatistic',
				'dependent' => true
			)
		)
	);

/**
 * Initiate Tree behavior
 *
 * @param object $Model instance of model
 * @param array $fields array of configuration settings.
 * @return void
 * @access public
 */
	function setup(&$Model, $settings) {
		if ($Model->alias == 'User') {
			$this->userModel = true;
			$this->_bindUserRelationships($Model);
		}
		if (isset($settings['triggers']) && $settings['triggers']) {
			$this->triggers = $settings['triggers'];
		}
	}
	
/**
 * Initiate Tree behavior
 *
 * @param object $Model instance of model
 * @param array $fields array of configuration settings.
 * @return void
 * @access public
 */
	function afterSave(&$Model, $created) {	
		if ($Model->alias == 'User' && $created) {	
			// If a new user registered, create related profiles
			if (!isset($this->data['UserAnswerProfile']) || empty($this->data['UserAnswerProfile'])) {
				$data['UserAnswerProfile']['user_id'] = $Model->id;
				$data['UserAnswerProfile']['alias'] = $this->data['Member']['first_name']. ' '.substr($this->data['Member']['last_name'], 0, 1);
				$Model->UserAnswerProfile->save($data);
			}
			if (!isset($this->data['UserStatistic']) || empty($this->data['UserStatistic'])) {
				$data['UserStatistic']['user_id'] = $Model->id;
				$Model->UserStatistic->save($data);
			}
			// Give user registration points
			$Model->assignPoints('register', $Model->id, $Model->id);
		}
	}
	
/**
 * Check the limits of the target user to see if they are allowed to post more content
 *
 * Action checks (login once per day, 50 thumb up max, register) should be performed in the controller actions only
 *
 * @param object $Model instance of model
 * @param array $fields array of configuration settings.
 * @return boolean
 * @access public
 */
	function isUnderLimit(&$Model, $data) {
		$userId = (is_array($data)) ? $data['user_id'] : $data;
		$userLevel = $Model->User->UserStatistic->find('first', array(
			'conditions'=>array(
				'UserStatistic.user_id' => $userId,
			),
			'contain' => array(
				'UserLevel'
			)
		));
		
		$count = $Model->find('count', array('conditions'=>array(
			$Model->alias.'.user_id' => $userId,
			$Model->alias.'.created > ' => date('Y-m-d g:i:s', strtotime('-1 day'))
		)));
		
		return ($count < $userLevel['UserLevel'][Inflector::underscore($Model->alias).'_limit']);
	}
	
/**
 * Add points from the point event to the target user
 *
 * model_foreign_key is used in conjunction to show which record from the related model caused the points
 *
 * @param object $Model instance of model
 * @param array $fields array of configuration settings.
 * @return void
 * @access public
 */
	function assignPoints(&$Model, $code, $userId, $foreignKey = null) {
		// If the current model is a user model, displace the loaded model instance so following code works
		if ($Model->alias == 'User') {
			$Model = $Model->Point;
		}
		
		if (!$event = $Model->User->Point->PointEvent->find('first', array(
			'fields' => array('id', 'points'),
			'recursive' => -1,
			'conditions' => array('PointEvent.code' => $code))
		)) {
			return false;
		}
		
		$data['Point'] = array(
			'point_event_id' => $event['PointEvent']['id'],
			'user_id' => $userId,
			'points' => $event['PointEvent']['points'],
		);
		
		$data['Point']['model_foreign_key'] = $foreignKey;
		
		$success = $Model->User->Point->save($data);
		
		return $success;
	}

/**
 * Remove points from the point event to the target user
 *
 * model_foreign_key is used in conjunction to show which record from the related model caused the points
 *
 * @param object $Model instance of model
 * @param array $fields array of configuration settings.
 * @return void
 * @access public
 */
	function removePoints(&$Model, $code, $foreignKey) {
		if (!$event = $Model->User->Point->PointEvent->find('first', array(
			'fields' => array('id'),
			'conditions' => array('PointEvent.code' => $code))
		)) {
			return false;
		}
		
		$success = $this->User->Point->deleteAll(array(
			'point_event_id' => $event['PointEvent']['id'],
			'model_foreign_key' => $foreignKey,
		));
		return $success;
	}
	
/**
 * Bind all related models in the plugin to the User model
 *
 * @return boolean success
 * @access public
 */
	function _bindUserRelationships(&$Model) {
		$success = $Model->bindModel($this->relationships, false);
		
		return $success;
	}
	
}
?>
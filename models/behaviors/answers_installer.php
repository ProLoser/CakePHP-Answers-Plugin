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
	var $User = null;
	
/**
 * User Model
 *
 * @var array
 * @access protected
 */
	var $triggers = array();

/**
 * Initiate Tree behavior
 *
 * @param object $Model instance of model
 * @param array $fields array of configuration settings.
 * @return void
 * @access public
 */
	function setup(&$Model, $settings) {
		if (isset($settings['userModel']) && $settings['userModel']) {
			$this->userModel = $Model->alias;
			// Store the user model reference
			$this->User = $Model;
			$this->bindUserRelationships($Model);
		}
		if (isset($settings['triggers']) && $settings['triggers']) {
			// Store a newly registered user model
			$this->User = ClassRegistry::init('User');;
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
		if ($created) {
			// If a new user registered, create related profiles
			if ($this->userModel) {
			
				if (!isset($this->data['UserAnswerProfile']) || empty($this->data['UserAnswerProfile'])) {
					$data['UserAnswerProfile']['user_id'] = $Model->id;
					$Model->UserAnswerProfile->save($data);
				}
				if (!isset($this->data['UserStatistic']) || empty($this->data['UserStatistic'])) {
					$data['UserStatistic']['user_id'] = $Model->id;
					$Model->UserStatistic->save($data);
				}
			}
			
			
			
			
		}
	}
	
/**
 * Check the limits of the target user to see if they are allowed to post more content
 *
 * Action checks (login once per day, 50 thumb up max, register) should be performed in the controller actions only
 *
 * @param object $Model instance of model
 * @param array $fields array of configuration settings.
 * @return void
 * @access public
 */
	function checkLimit($targetModel, $userId) {
		$userLevel = $this->User->UserStatistic->find('first', array(
			'conditions'=>array(
				'UserStatistic.user_id' => $userId,
			),
			'contain' => array(
				'UserLevel'
			)
		));
		
		$count = $this->User->{$targetModel}->find('count', array('conditions'=>array(
			$targetModel.'.user_id' => $userId,
			$targetModel.'.created > ' => date('Y-m-d g:i:s', strtotime('-1 day'))
		)));
		
		return ($count < $userLevel['UserLevel'][Inflector::underscore($model).'_limit']);
	}
	
/**
 * Assign points from the point event to the target user
 *
 * model_foreign_key is used in conjunction to show which record from the related model caused the points
 *
 * @param object $Model instance of model
 * @param array $fields array of configuration settings.
 * @return void
 * @access public
 */
	function assignPoints($code, $userId, $foreignKey = null) {
		if (!$event = $this->User->Point->PointEvent->find('first', array(
			'recursive' => -1, 
			'conditions' => array('PointEvent.code' => $code))
		)) {
			return false;
		}
		debug($event);die;
		$data['Point'] = array(
			'point_event_id' => $event['Event']['id'],
			'user_id' => $userId,
			'points' => $event['Event']['points'],
		);
		if ($foreignKey) {
			$data['Point']['model_foreign_key'] = $foreignKey;
		}
		if ($this->User->Point->save($data)) {
			return true;
		} else {
			return false;
		}
	}
	
/**
 * Bind all related models in the plugin to the User model
 *
 * @return boolean success
 * @access public
 */
	function bindUserRelationships(&$Model) {
		$success = $Model->bindModel(array(
			'hasMany'=> array(
				'Answer' => array('className' => 'Answers.Answer'),				
				'Question'=> array('className' => 'Answers.Question'),
				'BestAnswer'=> array('className' => 'Answers.BestAnswer'),
				'Report'=> array('className' => 'Answers.Report'),
				'Point'=> array('className' => 'Answers.Point'),
				'FavoriteQuestion'=> array('className' => 'Answers.FavoriteQuestion')
			),
			'hasOne' => array(
				'UserAnswerProfile'=> array('className' => 'Answers.UserAnswerProfile'),
				'UserStatistic'=> array('className' => 'Answers.UserStatistic')
			)
		));
		
		return $success;
	}
	
}
?>
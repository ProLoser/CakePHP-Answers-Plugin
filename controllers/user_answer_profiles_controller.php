<?php
class UserAnswerProfilesController extends AnswersAppController {

	var $name = 'UserAnswerProfiles';

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny('index');
	}
	
	function index(){
		//$this->UserAnswerProfile->User->recursive=2;
		$id = $this->Auth->user('id');	
		$this->set('userAnswerProfile', $this->UserAnswerProfile->User->read(null, $id));
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__("Invalid User", true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('userAnswerProfile', $this->UserAnswerProfile->find('first', array(
			'conditions' => array('user_id' => $id)
		)));
	}
	
	function edit() {
		$id = $this->Auth->user('id');
		if (!empty($this->data)) {
			if ($this->{$this->modelClass}->save($this->data)) {
				$this->Session->setFlash(__("The {$this->modelClass} has been saved", true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__("The {$this->modelClass} could not be saved. Please, try again.", true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->UserAnswerProfile->User->read(null, $id);
		}
	}
	function delete(){
		//$id = $this->Auth->user('id');
	}
}
?>
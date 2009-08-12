<?php
class FavoriteQuestionsController extends AnswersAppController {

	var $name = 'FavoriteQuestions';
	
	function index() {
		$this->set('questions', $this->FavoriteQuestion->Question->find('all', array(
			'conditions' => array('FavoriteQuestion.user_id' => $this->Auth->user('id')),
			'contain' => array(
				'User', 'Category', 'FavoriteQuestion'
			)
		)));
	}
	
	function add($id = null) {
		if ($id) {
			$this->FavoriteQuestion->create();
			$this->data['FavoriteQuestion']['question_id'] = $id;
			$this->data['FavoriteQuestion']['user_id'] = $this->Auth->user('id');
			if ($this->FavoriteQuestion->save($this->data)) {
				$this->Session->setFlash(__('The Question has been starred', true));
			} else {
				$this->Session->setFlash(__('The Question could not be starred. Please, try again.', true));
			}
		}
		$this->redirect($this->referer());
	}
	
	function delete($id = null) {
		if ($id) {
			if ($this->FavoriteQuestion->delete($id)) {
				$this->Session->setFlash(__('The Question has been unstarred', true));
			} else {
				$this->Session->setFlash(__('The Question could not be unstarred. Please, try again.', true));
			}
		}
		$this->redirect($this->referer());
	}

}
?>
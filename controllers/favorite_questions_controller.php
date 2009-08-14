<?php
class FavoriteQuestionsController extends AnswersAppController {

	var $name = 'FavoriteQuestions';
	
	function index() {
		$this->set('questions', $this->FavoriteQuestion->find('all', array(
			'conditions' => array('FavoriteQuestion.user_id' => $this->Auth->user('id')),
			'contain' => array(
				'Question' => array(
					'Category.id',
					'Category.name',
					'User.id',
					'User.username', 
				),
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
				//$this->flash('The Question has been starred', $this->referer());
			}
		}
		$this->redirect($this->referer());
	}
	
	function delete($questionId = null) {
		if ($questionId) {
			$id = $this->FavoriteQuestion->field('id', array(
				'FavoriteQuestion.question_id' => $questionId,
				'FavoriteQuestion.user_id' => $this->Auth->user('id')
			));
			if ($this->FavoriteQuestion->delete($id)) {
				$this->Session->setFlash(__('The Question has been unstarred', true));
			}
		}
		$this->redirect($this->referer());
	}
	
}
?>
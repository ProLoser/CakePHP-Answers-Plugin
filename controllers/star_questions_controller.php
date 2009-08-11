<?php
class StarQuestionsController extends AnswersAppController {

	var $name = 'StarQuestions';
	
	function add($id = null) {
		if ($id) {
			$this->StarQuestion->create();
			$this->data['StarQuestion']['question_id'] = $id;
			$this->data['StarQuestion']['user_id'] = $this->Auth->user('id');
			if ($this->StarQuestion->save($this->data)) {
				$this->Session->setFlash(__('The Question has been starred', true));
			} else {
				$this->Session->setFlash(__('The Question could not be starred. Please, try again.', true));
			}
		}
		$this->redirect($this->referer());
	}
	
	function delete($id = null) {
		if ($id) {
			if ($this->StarQuestion->delete($id)) {
				$this->Session->setFlash(__('The Question has been unstarred', true));
			} else {
				$this->Session->setFlash(__('The Question could not be unstarred. Please, try again.', true));
			}
		}
		$this->redirect($this->referer());
	}

}
?>
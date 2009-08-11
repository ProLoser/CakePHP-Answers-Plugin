<?php
class BestAnswersController extends AnswersAppController {

	var $name = 'BestAnswers';
	
	function add($questionId = null, $answerId = null) {
		if (!$questionId || !$answerId || !$this->_owner($questionId, 'Question')) {
			$this->Session->setFlash(__('Invalid id', true));
			$this->redirect(array('controller'=>'questions','action'=>'index'));
		}
		$data['BestAnswer']['question_id'] = $questionId;
		$data['BestAnswer']['answer_id'] = $answerId;
		if ($this->BestAnswer->save($data)) {
			$this->Session->setFlash(__('Best Answer was set', true));
			$this->redirect(array('controller'=>'questions','action'=>'view', $questionId));
		} else {
			$this->Session->setFlash(__('Best Answer could not be set', true));
			$this->redirect(array('controller'=>'questions','action'=>'view', $questionId));
		}
	}
	
}
?>
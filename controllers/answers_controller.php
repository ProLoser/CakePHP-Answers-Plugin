<?php
class AnswersController extends AnswersAppController {

	var $name = 'Answers';

	function index() {
		$this->redirect(array('controller'=>'questions'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Answer.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('answer', $this->Answer->read(null, $id));
	}

	function add($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Answer', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			$this->Answer->create();
			$this->data['Answer']['user_id'] = $this->Auth->user('id');
			if ($this->Answer->save($this->data)) {
				$this->Session->setFlash(__('The Answer has been saved', true));
				$this->redirect(array('controller'=>'questions','action'=>'view',$this->data['Answer']['question_id']));
			} else {
				$this->Session->setFlash(__('The Answer could not be saved. Please, try again.', true));
			}
		}
		
		if (empty($this->data)) {
			$this->data['Answer']['question_id'] = $id;
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Answer', true));
			$this->redirect(array('controller'=>'questions','action'=>'view',$this->data['Answer']['question_id']));
		}
		if (!empty($this->data)) {
			if ($this->Answer->save($this->data)) {
				$this->Session->setFlash(__('The Answer has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Answer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Answer->read(null, $id);
		}
	}
	
	function givepoints($id = null, $points = null) {
		if (!$id && !$points) {
			$this->Session->setFlash(__('Invalid Answer', true));
			$this->redirect('/');
		}
		$this->Answer = $this->Answer->read(null, $id);
		$question = $this->Answer->Question->read('Question', $this->Answer->question_id);
		if (
			$question['Question']['user_id'] == $this->Auth->user('id')
			|| $question['Question']['points'] + $points <= MAX_POINTS
		) {
			if ($this->Answer->saveField('points', $points)) {
				$this->Session->setFlash(__('You just gave '.$points.' points', true));
				$this->redirect(array('controller'=>'questions','action'=>'view',$question['Question']['id']));
			} else {
				$this->Session->setFlash(__('There was an error trying to give the answer points.', true));
				$this->redirect(array('controller'=>'questions','action'=>'view',$question['Question']['id']));
			}
		} else {
			$this->Session->setFlash(__('You cannot give more points.', true));
			$this->redirect(array('controller'=>'questions','action'=>'view',$question['Question']['id']));
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Answer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Answer->del($id)) {
			$this->Session->setFlash(__('Answer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}


	function admin_index() {
		$this->Answer->recursive = 0;
		$this->set('answers', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Answer.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('answer', $this->Answer->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Answer->create();
			if ($this->Answer->save($this->data)) {
				$this->Session->setFlash(__('The Answer has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Answer could not be saved. Please, try again.', true));
			}
		}
		$questions = $this->Answer->Question->find('list');
		$users = $this->Answer->User->find('list');
		$this->set(compact('questions', 'users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Answer', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Answer->save($this->data)) {
				$this->Session->setFlash(__('The Answer has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Answer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Answer->read(null, $id);
		}
		$questions = $this->Answer->Question->find('list');
		$users = $this->Answer->User->find('list');
		$this->set(compact('questions','users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Answer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Answer->del($id)) {
			$this->Session->setFlash(__('Answer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
<?php
class QuestionsController extends AnswersAppController {

	var $name = 'Questions';
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny('mine');
	}
	
	function home() {
		$this->Question->recursive = 0;
		$this->set('questions', $this->paginate());
	}

	function index() {
		$this->Question->recursive = 0;
		$this->set('questions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Question.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('question', $this->Question->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Question->create();
			$this->data['Question']['user_id'] = $this->Auth->user('id');
			if ($this->Question->save($this->data)) {
				$this->Session->setFlash(__('The Question has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Question could not be saved. Please, try again.', true));
			}
		}
		$tags = $this->Question->Tag->find('list');
		$topics = $this->Question->Topic->find('list');
		$users = $this->Question->User->find('list');
		$categories = $this->Question->Category->find('list');
		$this->set(compact('tags', 'topics', 'users', 'categories'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Question', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Question->save($this->data)) {
				$this->Session->setFlash(__('The Question has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Question could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Question->read(null, $id);
		}
		$tags = $this->Question->Tag->find('list');
		$topics = $this->Question->Topic->find('list');
		$users = $this->Question->User->find('list');
		$categories = $this->Question->Category->find('list');
		$this->set(compact('tags','topics','users','categories'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Question', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Question->del($id)) {
			$this->Session->setFlash(__('Question deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function mine() {
		$this->Question->recursive = 0;
		$this->paginate['Question']['conditions'] = array('Question.user_id' => $this->Auth->user('id'));
		$this->set('questions', $this->paginate());
	}


	function admin_index() {
		$this->Question->recursive = 0;
		$this->set('questions', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Question.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('question', $this->Question->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Question->create();
			if ($this->Question->save($this->data)) {
				$this->Session->setFlash(__('The Question has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Question could not be saved. Please, try again.', true));
			}
		}
		$tags = $this->Question->Tag->find('list');
		$topics = $this->Question->Topic->find('list');
		$users = $this->Question->User->find('list');
		$categories = $this->Question->Category->find('list');
		$this->set(compact('tags', 'topics', 'users', 'categories'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Question', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Question->save($this->data)) {
				$this->Session->setFlash(__('The Question has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Question could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Question->read(null, $id);
		}
		$tags = $this->Question->Tag->find('list');
		$topics = $this->Question->Topic->find('list');
		$users = $this->Question->User->find('list');
		$categories = $this->Question->Category->find('list');
		$this->set(compact('tags','topics','users','categories'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Question', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Question->del($id)) {
			$this->Session->setFlash(__('Question deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
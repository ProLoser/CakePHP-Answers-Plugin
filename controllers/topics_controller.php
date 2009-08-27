<?php
class TopicsController extends AnswersAppController {

	var $name = 'Topics';

	function index() {
		$this->Topic->recursive = 0;
		$this->set('topics', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Topic.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('topic', $this->Topic->find('first', array(
			'conditions' => array('topic.id' => $id),
			'contain' => array(
				'Consultant'=> array(
					'Member.first_name',
					'Member.last_name',
					'Member.id',
					'Member.picture'
				),
				'Question' => array(
					'Category.name',
					'Category.id',
					'User' => array(
						'fields' => array(
							'id',
//							'username'
						),
					),
				),
			)
		)));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Topic->create();
			if ($this->Topic->save($this->data)) {
				$this->Session->setFlash(__('The Topic has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Topic could not be saved. Please, try again.', true));
			}
		}
		$consultants = $this->Topic->Consultant->find('list');
		$questions = $this->Topic->Question->find('list');
		$this->set(compact('consultants', 'questions'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Topic', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Topic->save($this->data)) {
				$this->Session->setFlash(__('The Topic has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Topic could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Topic->read(null, $id);
		}
		$consultants = $this->Topic->Consultant->find('list');
		$questions = $this->Topic->Question->find('list');
		$this->set(compact('consultants','questions'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Topic', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Topic->del($id)) {
			$this->Session->setFlash(__('Topic deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}


	function admin_index() {
		$this->Topic->recursive = 0;
		$this->set('topics', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Topic.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('topic', $this->Topic->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Topic->create();
			if ($this->Topic->save($this->data)) {
				$this->Session->setFlash(__('The Topic has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Topic could not be saved. Please, try again.', true));
			}
		}
		$consultants = $this->Topic->Consultant->find('list');
		$questions = $this->Topic->Question->find('list');
		$this->set(compact('consultants', 'questions'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Topic', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Topic->save($this->data)) {
				$this->Session->setFlash(__('The Topic has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Topic could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Topic->read(null, $id);
		}
		$consultants = $this->Topic->Consultant->find('list');
		$questions = $this->Topic->Question->find('list');
		$this->set(compact('consultants','questions'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Topic', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Topic->del($id)) {
			$this->Session->setFlash(__('Topic deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
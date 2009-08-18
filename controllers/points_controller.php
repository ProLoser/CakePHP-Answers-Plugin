<?php
class PointsController extends AnswersAppController {

	var $name = 'Points';
	
	function index() {
		$this->_index();
	}
	function admin_add() {
		$this->_add();
	}
	
	function admin_index() {
		$this->_index();
	}
	
	function admin_view($id = null) {
		$this->_view($id);
	}
	
	function admin_delete($id = null) {
		$this->_delete($id);
	}
	
}
?>
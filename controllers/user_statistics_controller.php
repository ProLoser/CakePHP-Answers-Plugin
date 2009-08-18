<?php
class UserStatisticsController extends AnswersAppController {

	var $name = 'UserStatistics';
	
	function index() {
		$this->_index();
	}

	function admin_index() {
		$this->_index();
	}
	
	function admin_view($id = null) {
		$this->_view($id);
	}
	
	function admin_add() {
		$this->_add();
	}
	
	function admin_edit($id = null) {
		$this->_edit($id);
	}
	
	function admin_delete($id = null) {
		$this->_delete($id);
	}
	
}
?>
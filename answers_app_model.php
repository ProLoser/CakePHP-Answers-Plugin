<?php
class AnswersAppModel extends AppModel {
	
	function toggle($id = null, $field = null) {
	
		$toggle = $this->field($field, array($this->name.'.id' => $id));
		
		// If true, set to false, otherwise set to true
		if ($toggle) {
			$value = 0;
		} else {
			$value = 1;
		}
		
		$this->saveField($field, $value);
		
		return $value;
	
	}
	
}
?>
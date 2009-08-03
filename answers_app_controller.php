<?php

class AnswersAppController extends AppController {
	
	var $helpers = array('Html', 'Form', 'Javascript', 'Time');

	function beforeFilter() {
		// Ensures that all models joined with Authenticated users use the right table.
		if (isset($this->{$this->modelClass}->belongsTo['User'])) {
			$this->belongsTo['User'] = array('className' => $this->Auth->userModel);
		}
		if (isset($this->{$this->modelClass}->hasMany['User'])) {
			$this->hasMany['User'] = array('className' => $this->Auth->userModel);
		}
		if (isset($this->{$this->modelClass}->hasOne['User'])) {
			$this->hasOne['User'] = array('className' => $this->Auth->userModel);
		}
		if (isset($this->{$this->modelClass}->hasManyAndBelongsTo['User'])) {
			$this->hasManyAndBelongsTo['User'] = array('className' => $this->Auth->userModel);
		}
		parent::beforeFilter();
	}

}

?>
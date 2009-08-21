<?php
class BestAnswer extends AppModel {

	var $name = 'BestAnswer';
	var $validate = array(
		'question_id' => array('isUnique'),
		'answer_id' => array('numeric'),
		'user_id' => array('numeric')
	);
	var $actsAs = array(
		'AnswersInstaller'
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'question_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Answer' => array(
			'className' => 'Answer',
			'foreignKey' => 'answer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function beforeSave() {
		$questionUserId = $this->Question->field('user_id', array('question_id' => this->data['BestAnswer']['question_id']));
		$answerUserId = $this->Answer->field('user_id', array('answer_id' => this->data['BestAnswer']['answer_id']));
		$success = (
			$this->deleteAll(array('BestAnswer.question_id'=>$this->data['BestAnswer']['question_id']))
			&& $this->assignPoints('bestanswer', $questionUserId, $this->id)
			&& $this->assignPoints('youranswerbest', $answerUserId, $this->id)
		);
		return $success;
	}

}
?>
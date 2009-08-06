<?php echo $form->create('Answers.Answer', array('class'=>'hide'));?>
	<fieldset>
		<legend><?php echo $html->link('Answer Question', array('plugin'=>'answers','controller'=>'answers','action'=>'add', $questionId));?></legend>
	<?php
		echo $form->input('answer');
		echo $form->input('question_id', array('type'=>'hidden', 'value'=>$questionId));
		echo $form->submit('Submit');
	?>
	</fieldset>
<?php echo $form->end();?>
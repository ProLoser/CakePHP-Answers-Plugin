<div class="questions form">
<?php echo $form->create('Question');?>
	<fieldset>
 		<legend><?php __('Edit Question');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('title');
		echo $form->input('details');
		echo $form->input('category_id');
		echo $form->input('Tag');
		echo $form->input('Topic');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<?php $this->set('actions', array(
		'Delete Question' => array('action'=>'delete', $this->data['Question']['id']),
	)); ?>
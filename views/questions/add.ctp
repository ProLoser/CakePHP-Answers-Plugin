<div class="questions form">
<?php echo $form->create('Question');?>
	<fieldset>
 		<legend><?php __('Add Question');?></legend>
	<?php
		echo $form->input('title');
		echo $form->input('details');
		echo $form->input('category_id');
		//echo $form->input('Tag');
		echo $form->input('Topic', array('multiple' => 'checkbox'));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
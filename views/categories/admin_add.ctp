<div class="categories form">
<?php echo $form->create('Category');?>
	<fieldset>
 		<legend><?php __('Add Category');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('parent_id', array('empty'=>' - No Parent - ', 'escape' => false));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
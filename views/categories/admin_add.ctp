<div class="categories form">
<?php echo $form->create('Category');?>
	<fieldset>
 		<legend><?php __('Add Category');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('specials');
		echo $form->input('parent_id');
		echo $form->input('rght');
		echo $form->input('lft');
		echo $form->input('Consultant');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Categories', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Questions', true), array('controller'=> 'questions', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Question', true), array('controller'=> 'questions', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Consultants', true), array('controller'=> 'consultants', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Consultant', true), array('controller'=> 'consultants', 'action'=>'add')); ?> </li>
	</ul>
</div>

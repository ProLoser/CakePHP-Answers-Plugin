<div class="topics form">
<?php echo $form->create('Topic');?>
	<fieldset>
 		<legend><?php __('Add Topic');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('specials');
		echo $form->input('Consultant');
		echo $form->input('Question');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Topics', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Consultants', true), array('controller'=> 'consultants', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Consultant', true), array('controller'=> 'consultants', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Questions', true), array('controller'=> 'questions', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Question', true), array('controller'=> 'questions', 'action'=>'add')); ?> </li>
	</ul>
</div>

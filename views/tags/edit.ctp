<div class="tags form">
<?php echo $form->create('Tag');?>
	<fieldset>
 		<legend><?php __('Edit Tag');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('tag');
		echo $form->input('Question');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Tag.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Tag.id'))); ?></li>
		<li><?php echo $html->link(__('List Tags', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Questions', true), array('controller'=> 'questions', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Question', true), array('controller'=> 'questions', 'action'=>'add')); ?> </li>
	</ul>
</div>

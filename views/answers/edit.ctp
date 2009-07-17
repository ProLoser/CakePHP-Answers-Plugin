<div class="answers form">
<?php echo $form->create('Answer');?>
	<fieldset>
 		<legend><?php __('Edit Answer');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('answer');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Answer.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Answer.id'))); ?></li>
		<li><?php echo $html->link(__('List Answers', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Questions', true), array('controller'=> 'questions', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Question', true), array('controller'=> 'questions', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller'=> 'users', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller'=> 'users', 'action'=>'add')); ?> </li>
	</ul>
</div>

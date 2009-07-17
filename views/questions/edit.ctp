<div class="questions form">
<?php echo $form->create('Question');?>
	<fieldset>
 		<legend><?php __('Edit Question');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('subject');
		echo $form->input('message');
		echo $form->input('category_id');
		echo $form->input('Tag');
		echo $form->input('Topic');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Question.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Question.id'))); ?></li>
		<li><?php echo $html->link(__('List Questions', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller'=> 'users', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller'=> 'users', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Categories', true), array('controller'=> 'categories', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Category', true), array('controller'=> 'categories', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Answers', true), array('controller'=> 'answers', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Answer', true), array('controller'=> 'answers', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Tags', true), array('controller'=> 'tags', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Tag', true), array('controller'=> 'tags', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Topics', true), array('controller'=> 'topics', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Topic', true), array('controller'=> 'topics', 'action'=>'add')); ?> </li>
	</ul>
</div>

<div class="userLevels form">
<?php echo $form->create('UserLevel');?>
	<fieldset>
 		<legend><?php __('Edit UserLevel');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('from_points');
		echo $form->input('to_points');
		echo $form->input('question_limit');
		echo $form->input('answer_limit');
		echo $form->input('comment_limit');
		echo $form->input('favorite_limit');
		echo $form->input('rating_limit');
		echo $form->input('vote_limit');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('UserLevel.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('UserLevel.id'))); ?></li>
		<li><?php echo $html->link(__('List UserLevels', true), array('action'=>'index'));?></li>
	</ul>
</div>

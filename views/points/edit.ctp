<div class="points form">
<?php echo $form->create('Point');?>
	<fieldset>
 		<legend><?php __('Edit Point');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('event_id');
		echo $form->input('user_id');
		echo $form->input('model');
		echo $form->input('foreign_key');
		echo $form->input('points');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Point.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Point.id'))); ?></li>
		<li><?php echo $html->link(__('List Points', true), array('action'=>'index'));?></li>
	</ul>
</div>

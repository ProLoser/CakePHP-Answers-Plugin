<div class="pointEvents form">
<?php echo $form->create('PointEvent');?>
	<fieldset>
 		<legend><?php __('Edit PointEvent');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('code');
		echo $form->input('description');
		echo $form->input('model');
		echo $form->input('points');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('PointEvent.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('PointEvent.id'))); ?></li>
		<li><?php echo $html->link(__('List PointEvents', true), array('action'=>'index'));?></li>
	</ul>
</div>

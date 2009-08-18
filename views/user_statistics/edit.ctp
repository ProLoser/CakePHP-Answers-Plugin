<div class="userStatistics form">
<?php echo $form->create('UserStatistic');?>
	<fieldset>
 		<legend><?php __('Edit UserStatistic');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('user_id');
		echo $form->input('level');
		echo $form->input('points');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('UserStatistic.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('UserStatistic.id'))); ?></li>
		<li><?php echo $html->link(__('List UserStatistics', true), array('action'=>'index'));?></li>
	</ul>
</div>

<div class="points form">
<?php echo $form->create('Point');?>
	<fieldset>
 		<legend><?php __('Add Point');?></legend>
	<?php
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
		<li><?php echo $html->link(__('List Points', true), array('action'=>'index'));?></li>
	</ul>
</div>

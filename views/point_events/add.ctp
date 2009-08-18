<div class="pointEvents form">
<?php echo $form->create('PointEvent');?>
	<fieldset>
 		<legend><?php __('Add PointEvent');?></legend>
	<?php
		echo $form->input('code');
		echo $form->input('description');
		echo $form->input('points');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List PointEvents', true), array('action'=>'index'));?></li>
	</ul>
</div>

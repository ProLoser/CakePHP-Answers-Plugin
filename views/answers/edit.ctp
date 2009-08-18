<div class="answers form">
	<h2><?php echo $question['Question']['title']; ?></h2>
	<p><?php echo $question['Question']['details']; ?></p>
	<?php echo $form->create('Answer');?>
		<fieldset>
			<legend><?php __('Edit Answer');?></legend>
		<?php
			echo $form->input('answer');
			echo $form->input('id');
		?>
		</fieldset>
	<?php echo $form->end('Submit');?>
</div>
<?php
$actions = array(
	'Delete' => array('action'=>'delete', $form->value('Answer.id'))
);
?>
<div class="answers form">
	<h2><?php echo $question['Question']['title']; ?></h2>
	<p><?php echo $question['Question']['details']; ?></p>
	<?php echo $form->create('Answer');?>
		<fieldset>
			<legend><?php __('Add Answer');?></legend>
		<?php
			echo $form->input('answer');
			echo $form->input('question_id', array('type'=>'hidden'));
		?>
		</fieldset>
	<?php echo $form->end('Submit');?>
</div>
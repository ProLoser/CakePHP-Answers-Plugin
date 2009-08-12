<div class="userAnswerProfiles form">
<?php echo $form->create('UserAnswerProfile');?>
	<fieldset>
 		<legend><?php __('Edit UserAnswerProfile');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('user_id');
		echo $form->input('alias');
		echo $form->input('avatar_option');
		echo $form->input('show_link_profile');
		echo $form->input('allow_contact');
		echo $form->input('allow_fans');
		echo $form->input('notify_question_answered');
		echo $form->input('notify_friend_asks');
		echo $form->input('notify_new_fan');
		echo $form->input('subscribe_newsletter');
		echo $form->input('gender');
		echo $form->input('dob');
		echo $form->input('is_public');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('UserAnswerProfile.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('UserAnswerProfile.id'))); ?></li>
		<li><?php echo $html->link(__('List UserAnswerProfiles', true), array('action'=>'index'));?></li>
	</ul>
</div>

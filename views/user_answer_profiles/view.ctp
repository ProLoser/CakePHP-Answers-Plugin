<div class="userAnswerProfiles view">
<h2><?php  __('UserAnswerProfile');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAnswerProfile['UserAnswerProfile']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAnswerProfile['UserAnswerProfile']['user_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Alias'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAnswerProfile['UserAnswerProfile']['alias']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Avatar Option'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAnswerProfile['UserAnswerProfile']['avatar_option']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Show Link Profile'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAnswerProfile['UserAnswerProfile']['show_link_profile']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Allow Contact'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAnswerProfile['UserAnswerProfile']['allow_contact']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Allow Fans'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAnswerProfile['UserAnswerProfile']['allow_fans']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notify Question Answered'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAnswerProfile['UserAnswerProfile']['notify_question_answered']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notify Friend Asks'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAnswerProfile['UserAnswerProfile']['notify_friend_asks']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notify New Fan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAnswerProfile['UserAnswerProfile']['notify_new_fan']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subscribe Newsletter'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAnswerProfile['UserAnswerProfile']['subscribe_newsletter']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gender'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAnswerProfile['UserAnswerProfile']['gender']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dob'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAnswerProfile['UserAnswerProfile']['dob']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Is Public'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAnswerProfile['UserAnswerProfile']['is_public']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAnswerProfile['UserAnswerProfile']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAnswerProfile['UserAnswerProfile']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit UserAnswerProfile', true), array('action'=>'edit', $userAnswerProfile['UserAnswerProfile']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete UserAnswerProfile', true), array('action'=>'delete', $userAnswerProfile['UserAnswerProfile']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $userAnswerProfile['UserAnswerProfile']['id'])); ?> </li>
		<li><?php echo $html->link(__('List UserAnswerProfiles', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New UserAnswerProfile', true), array('action'=>'add')); ?> </li>
	</ul>
</div>

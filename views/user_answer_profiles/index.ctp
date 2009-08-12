<div class="userAnswerProfiles index">
<h2><?php __('UserAnswerProfiles');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('alias');?></th>
	<th><?php echo $paginator->sort('avatar_option');?></th>
	<th><?php echo $paginator->sort('show_link_profile');?></th>
	<th><?php echo $paginator->sort('allow_contact');?></th>
	<th><?php echo $paginator->sort('allow_fans');?></th>
	<th><?php echo $paginator->sort('notify_question_answered');?></th>
	<th><?php echo $paginator->sort('notify_friend_asks');?></th>
	<th><?php echo $paginator->sort('notify_new_fan');?></th>
	<th><?php echo $paginator->sort('subscribe_newsletter');?></th>
	<th><?php echo $paginator->sort('gender');?></th>
	<th><?php echo $paginator->sort('dob');?></th>
	<th><?php echo $paginator->sort('is_public');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($userAnswerProfiles as $userAnswerProfile):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $userAnswerProfile['UserAnswerProfile']['id']; ?>
		</td>
		<td>
			<?php echo $userAnswerProfile['UserAnswerProfile']['user_id']; ?>
		</td>
		<td>
			<?php echo $userAnswerProfile['UserAnswerProfile']['alias']; ?>
		</td>
		<td>
			<?php echo $userAnswerProfile['UserAnswerProfile']['avatar_option']; ?>
		</td>
		<td>
			<?php echo $userAnswerProfile['UserAnswerProfile']['show_link_profile']; ?>
		</td>
		<td>
			<?php echo $userAnswerProfile['UserAnswerProfile']['allow_contact']; ?>
		</td>
		<td>
			<?php echo $userAnswerProfile['UserAnswerProfile']['allow_fans']; ?>
		</td>
		<td>
			<?php echo $userAnswerProfile['UserAnswerProfile']['notify_question_answered']; ?>
		</td>
		<td>
			<?php echo $userAnswerProfile['UserAnswerProfile']['notify_friend_asks']; ?>
		</td>
		<td>
			<?php echo $userAnswerProfile['UserAnswerProfile']['notify_new_fan']; ?>
		</td>
		<td>
			<?php echo $userAnswerProfile['UserAnswerProfile']['subscribe_newsletter']; ?>
		</td>
		<td>
			<?php echo $userAnswerProfile['UserAnswerProfile']['gender']; ?>
		</td>
		<td>
			<?php echo $userAnswerProfile['UserAnswerProfile']['dob']; ?>
		</td>
		<td>
			<?php echo $userAnswerProfile['UserAnswerProfile']['is_public']; ?>
		</td>
		<td>
			<?php echo $userAnswerProfile['UserAnswerProfile']['created']; ?>
		</td>
		<td>
			<?php echo $userAnswerProfile['UserAnswerProfile']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $userAnswerProfile['UserAnswerProfile']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $userAnswerProfile['UserAnswerProfile']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $userAnswerProfile['UserAnswerProfile']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $userAnswerProfile['UserAnswerProfile']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New UserAnswerProfile', true), array('action'=>'add')); ?></li>
	</ul>
</div>

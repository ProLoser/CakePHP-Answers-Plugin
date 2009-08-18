<div class="userStatistics view">
<h2><?php  __('UserStatistic');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userStatistic['UserStatistic']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userStatistic['UserStatistic']['user_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Level'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userStatistic['UserStatistic']['level']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Points'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userStatistic['UserStatistic']['points']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userStatistic['UserStatistic']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userStatistic['UserStatistic']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit UserStatistic', true), array('action'=>'edit', $userStatistic['UserStatistic']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete UserStatistic', true), array('action'=>'delete', $userStatistic['UserStatistic']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $userStatistic['UserStatistic']['id'])); ?> </li>
		<li><?php echo $html->link(__('List UserStatistics', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New UserStatistic', true), array('action'=>'add')); ?> </li>
	</ul>
</div>

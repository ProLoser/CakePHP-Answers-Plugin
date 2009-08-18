<div class="pointEvents view">
<h2><?php  __('PointEvent');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pointEvent['PointEvent']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pointEvent['PointEvent']['code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pointEvent['PointEvent']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Points'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pointEvent['PointEvent']['points']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pointEvent['PointEvent']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pointEvent['PointEvent']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit PointEvent', true), array('action'=>'edit', $pointEvent['PointEvent']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete PointEvent', true), array('action'=>'delete', $pointEvent['PointEvent']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pointEvent['PointEvent']['id'])); ?> </li>
		<li><?php echo $html->link(__('List PointEvents', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New PointEvent', true), array('action'=>'add')); ?> </li>
	</ul>
</div>

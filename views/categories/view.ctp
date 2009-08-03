<div class="categories view">
<h2><?php echo $category['Category']['name']; ?></h2>
<div class="related">
	<h3><?php __('Related Consultants');?></h3>
	<?php if (!empty($category['Consultant'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Member Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($category['Consultant'] as $consultant):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $consultant['id'];?></td>
			<td><?php echo $consultant['created'];?></td>
			<td><?php echo $consultant['modified'];?></td>
			<td><?php echo $consultant['member_id'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'consultants', 'action'=>'view', $consultant['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'consultants', 'action'=>'edit', $consultant['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'consultants', 'action'=>'delete', $consultant['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $consultant['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Consultant', true), array('controller'=> 'consultants', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>

<div class="related">
	<h3><?php __('Related Questions');?></h3>
	<?php if (!empty($category['Question'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Created'); ?></th>
		<th><?php __('Subject'); ?></th>
		<th><?php __('Message'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Category Id'); ?></th>
		<th><?php __('Points'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($category['Question'] as $question):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $question['created'];?></td>
			<td><?php echo $question['title'];?></td>
			<td><?php echo $question['details'];?></td>
			<td><?php echo $question['user_id'];?></td>
			<td><?php echo $question['category_id'];?></td>
			<td><?php echo $question['answer_count'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'questions', 'action'=>'view', $question['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'questions', 'action'=>'edit', $question['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'questions', 'action'=>'delete', $question['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $question['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Question', true), array('controller'=> 'questions', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
</div>
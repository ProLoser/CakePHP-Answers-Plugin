<div class="topics view">
	<h2><?php echo $topic['Topic']['name']; ?></h2>

		<div class="questions home">
			<h3><?php __('Questions');?></h3>
			<?php echo $this->element('questions/questions', array('plugin'=>'answers','questions'=>$topic['Question'])); ?>
		</div>
		<div class="consultants home">
			<h3><?php __('Consultants');?></h3>
			<?php echo $this->element('consultants/consultants', array('plugin'=>null,'consultants'=>$topic['Consultant'], 'size'=>190)); ?>
		</div>



	<div class="related">
		<h3><?php __('Related Consultants');?></h3>
		<?php if (!empty($topic['Consultant'])):?>
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
			foreach ($topic['Consultant'] as $consultant):
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
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif; ?>
	</div>

		<div class="related">
			<h3><?php __('Related Questions');?></h3>
			<?php if (!empty($topic['Question'])):?>
			<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php __('Id'); ?></th>
				<th><?php __('Created'); ?></th>
				<th><?php __('Modified'); ?></th>
				<th><?php __('title'); ?></th>
				<th><?php __('details'); ?></th>
				<th><?php __('User Id'); ?></th>
				<th><?php __('Category Id'); ?></th>
				<th><?php __('Points'); ?></th>
				<th class="actions"><?php __('Actions');?></th>
			</tr>
			<?php
				$i = 0;
				foreach ($topic['Question'] as $question):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
				<tr<?php echo $class;?>>
					<td><?php echo $question['id'];?></td>
					<td><?php echo $question['created'];?></td>
					<td><?php echo $question['modified'];?></td>
					<td><?php echo $question['title'];?></td>
					<td><?php echo $question['details'];?></td>
					<td><?php echo $question['user_id'];?></td>
					<td><?php echo $question['category_id'];?></td>
					<td><?php echo $question['answer_count'];?></td>
				</tr>
			<?php endforeach; ?>
			</table>
		<?php endif; ?>

		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('List Topics', true), array('action'=>'index')); ?> </li>
				<li><?php echo $html->link(__('List Consultants', true), array('controller'=> 'consultants', 'action'=>'index')); ?> </li>
				<li><?php echo $html->link(__('List Questions', true), array('controller'=> 'questions', 'action'=>'index')); ?> </li>
				<li><?php echo $html->link(__('New Question', true), array('controller'=> 'questions', 'action'=>'add')); ?> </li>
			</ul>
		</div>
	</div>
</div>

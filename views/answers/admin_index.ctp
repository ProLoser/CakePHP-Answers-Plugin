<div class="answers index">
<h2><?php __('Answers');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th><?php echo $paginator->sort('answer');?></th>
	<th><?php echo $paginator->sort('question_id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($answers as $answer):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $answer['Answer']['id']; ?>
		</td>
		<td>
			<?php echo $answer['Answer']['created']; ?>
		</td>
		<td>
			<?php echo $answer['Answer']['modified']; ?>
		</td>
		<td>
			<?php echo $answer['Answer']['answer']; ?>
		</td>
		<td>
			<?php echo $html->link($answer['Question']['id'], array('controller'=> 'questions', 'action'=>'view', $answer['Question']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($answer['User']['id'], array('controller'=> 'users', 'action'=>'view', $answer['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $answer['Answer']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $answer['Answer']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $answer['Answer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $answer['Answer']['id'])); ?>
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
		<li><?php echo $html->link(__('New Answer', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Questions', true), array('controller'=> 'questions', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Question', true), array('controller'=> 'questions', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller'=> 'users', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller'=> 'users', 'action'=>'add')); ?> </li>
	</ul>
</div>

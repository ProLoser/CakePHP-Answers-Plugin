<div class="questions index">
<h2><?php __('My Questions');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('title');?></th>
	<th><?php echo $paginator->sort('category_id');?></th>
	<th><?php echo $paginator->sort('answer_count');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($questions as $question):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $question['Question']['created']; ?>
		</td>
		<td>
			<?php echo $question['Question']['title']; ?>
		</td>
		<td>
			<?php echo $html->link($question['Category']['name'], array('controller'=> 'categories', 'action'=>'view', $question['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $question['Question']['answer_count']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $question['Question']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $question['Question']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $question['Question']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $question['Question']['id'])); ?>
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
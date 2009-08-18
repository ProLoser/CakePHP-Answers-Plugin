<div class="points index">
<h2><?php __('Points');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('event_id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('model');?></th>
	<th><?php echo $paginator->sort('foreign_key');?></th>
	<th><?php echo $paginator->sort('points');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($points as $point):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $point['Point']['id']; ?>
		</td>
		<td>
			<?php echo $point['Point']['event_id']; ?>
		</td>
		<td>
			<?php echo $point['Point']['user_id']; ?>
		</td>
		<td>
			<?php echo $point['Point']['model']; ?>
		</td>
		<td>
			<?php echo $point['Point']['foreign_key']; ?>
		</td>
		<td>
			<?php echo $point['Point']['points']; ?>
		</td>
		<td>
			<?php echo $point['Point']['created']; ?>
		</td>
		<td>
			<?php echo $point['Point']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $point['Point']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $point['Point']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $point['Point']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $point['Point']['id'])); ?>
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
		<li><?php echo $html->link(__('New Point', true), array('action'=>'add')); ?></li>
	</ul>
</div>

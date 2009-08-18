<div class="pointEvents index">
<h2><?php __('PointEvents');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('code');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('model');?></th>
	<th><?php echo $paginator->sort('points');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($pointEvents as $pointEvent):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $pointEvent['PointEvent']['id']; ?>
		</td>
		<td>
			<?php echo $pointEvent['PointEvent']['code']; ?>
		</td>
		<td>
			<?php echo $pointEvent['PointEvent']['description']; ?>
		</td>
		<td>
			<?php echo $pointEvent['PointEvent']['model']; ?>
		</td>
		<td>
			<?php echo $pointEvent['PointEvent']['points']; ?>
		</td>
		<td>
			<?php echo $pointEvent['PointEvent']['created']; ?>
		</td>
		<td>
			<?php echo $pointEvent['PointEvent']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $pointEvent['PointEvent']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $pointEvent['PointEvent']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $pointEvent['PointEvent']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pointEvent['PointEvent']['id'])); ?>
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
		<li><?php echo $html->link(__('New PointEvent', true), array('action'=>'add')); ?></li>
	</ul>
</div>

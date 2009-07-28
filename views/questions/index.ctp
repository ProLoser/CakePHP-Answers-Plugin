<div class="questions index">
<h2><?php __('Questions');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('subject');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('category_id');?></th>
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
			<?php echo $question['Question']['subject']; ?>
		</td>
		<td>
			<?php echo $html->link($question['User']['username'], array('controller'=> 'users', 'action'=>'view', $question['User']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($question['Category']['name'], array('controller'=> 'categories', 'action'=>'view', $question['Category']['id'])); ?>
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
		<li><?php echo $html->link(__('New Question', true), array('action'=>'add')); ?></li>
	</ul>
</div>

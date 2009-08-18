<div class="userLevels index">
<h2><?php __('UserLevels');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('from_points');?></th>
	<th><?php echo $paginator->sort('to_points');?></th>
	<th><?php echo $paginator->sort('question_limit');?></th>
	<th><?php echo $paginator->sort('answer_limit');?></th>
	<th><?php echo $paginator->sort('comment_limit');?></th>
	<th><?php echo $paginator->sort('favorite_limit');?></th>
	<th><?php echo $paginator->sort('rating_limit');?></th>
	<th><?php echo $paginator->sort('vote_limit');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($userLevels as $userLevel):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $userLevel['UserLevel']['id']; ?>
		</td>
		<td>
			<?php echo $userLevel['UserLevel']['name']; ?>
		</td>
		<td>
			<?php echo $userLevel['UserLevel']['from_points']; ?>
		</td>
		<td>
			<?php echo $userLevel['UserLevel']['to_points']; ?>
		</td>
		<td>
			<?php echo $userLevel['UserLevel']['question_limit']; ?>
		</td>
		<td>
			<?php echo $userLevel['UserLevel']['answer_limit']; ?>
		</td>
		<td>
			<?php echo $userLevel['UserLevel']['comment_limit']; ?>
		</td>
		<td>
			<?php echo $userLevel['UserLevel']['favorite_limit']; ?>
		</td>
		<td>
			<?php echo $userLevel['UserLevel']['rating_limit']; ?>
		</td>
		<td>
			<?php echo $userLevel['UserLevel']['vote_limit']; ?>
		</td>
		<td>
			<?php echo $userLevel['UserLevel']['created']; ?>
		</td>
		<td>
			<?php echo $userLevel['UserLevel']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $userLevel['UserLevel']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $userLevel['UserLevel']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $userLevel['UserLevel']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $userLevel['UserLevel']['id'])); ?>
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
		<li><?php echo $html->link(__('New UserLevel', true), array('action'=>'add')); ?></li>
	</ul>
</div>

<p>
	<?php if (!empty($answer['BestAnswer'])): ?><span class="best">[Best Answer]</span><?php endif; ?>
	<?php echo $answer['answer']; ?>
</p>
<?php echo $html->link($answer['User']['username'], array('plugin'=>null, 'controller'=> 'users', 'action'=>'view', $answer['User']['id'])); ?>
 - <?php echo $time->timeAgoInWords($answer['created']); ?>
<?php if (isset($owner)): ?>
<?php endif; ?>
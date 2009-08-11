<p>
	<?php if (!empty($answer['BestAnswer'])): ?><span class="best">[Best Answer]</span><?php endif; ?>
	<?php echo $answer['answer']; ?>
</p>
<?php echo $html->link($answer['User']['username'], array('plugin'=>null, 'controller'=> 'users', 'action'=>'view', $answer['User']['id'])); ?>
 - <?php echo $time->timeAgoInWords($answer['created']); ?>
<?php if (isset($owner)): ?>
 <p><?php echo $html->link('Make Best Answer', array('plugin'=>'answers','controller'=>'best_answers','action'=>'add',$answer['question_id'],$answer['id']), array('class'=>'best')); ?></p>
<?php endif; ?>
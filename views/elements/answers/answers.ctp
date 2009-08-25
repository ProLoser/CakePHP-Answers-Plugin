<ul class="answers">
<?php 
$i = 0;
foreach ($answers['Answer'] as $answer):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<li<?php echo $class;?>>
		<?php				
			if (isset($size)) {
				$options['size'] =  $size;
			}
			
			$options['answer'] = (isset($answer['Answer'])) ? array_merge($answer['Answer'], $answer) : $answer;
			$options['plugin'] = 'answers';
		?>
		<p>
		<?php if ($answers['Question']['user_id'] == $session->read('Auth.User.id') && empty($answers['BestAnswer']['id'])): ?>
			<?php echo $html->link('Make Best Answer', array('plugin'=>'answers','controller'=>'best_answers','action'=>'add',$answer['question_id'],$answer['id']), array('class'=>'best')); ?>
		<?php endif; ?>
		<?php if ($answers['BestAnswer']['answer_id'] == $answer['id']): ?>
			<span class="best">[Best Answer]</span>
		<?php endif; ?>
			<?php echo $answer['answer']; ?>
		</p>
		<p>
			<?php echo $html->link($answer['User']['UserAnswerProfile']['alias'], array('plugin'=>null, 'controller'=> 'user_answer_profiles', 'action'=>'view', $answer['User']['id'])); ?>
			- <?php echo $time->timeAgoInWords($answer['created']); ?>
		</p>
	</li>
<?php endforeach; ?>
</ul>
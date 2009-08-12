<ul class="answers">
<?php
$i = 0;
foreach ($answers as $answer):
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
			echo $this->element('answers/answer', $options); 
		?>
		<?php if (isset($owner) && $owner) echo $html->link('Make Best Answer', array('plugin'=>'answers','controller'=>'best_answers','action'=>'add',$answer['question_id'],$answer['id']), array('class'=>'best')); ?>
	</li>
<?php endforeach; ?>
</ul>
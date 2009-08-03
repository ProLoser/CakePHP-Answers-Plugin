<?php if(isset($question['Question'])) { // Reformat array so that Direct and Related find arrays match
	$question = array_merge($question, $question['Question']); 
	unset($question['Question']); 
} ?>
<h4><?php echo $html->link($question['title'], array('controller'=>'questions','action'=>'view', $question['id'])); ?></h4>
In <?php echo $html->link($question['Category']['name'], array('controller'=> 'categories', 'action'=>'view', $question['Category']['id'])); ?> 
- Asked by <?php echo $html->link($question['User']['username'], array('controller'=> 'users', 'action'=>'view', $question['User']['id'])); ?> - <?php echo $question['answer_count']; ?> answers 
- <?php echo $time->timeAgoInWords($question['created']); ?>
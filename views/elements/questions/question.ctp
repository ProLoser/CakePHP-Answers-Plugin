<h4>
<?php echo (empty($question['FavoriteQuestion']['id'])) 
	? $html->link('[Star]', array('plugin'=>'answers','controller'=>'questions','action'=>'star', $question['id']), array('class'=>'star')) 
	: $html->link('[UnStar]', array('plugin'=>'answers','controller'=>'questions','action'=>'star', $question['id']), array('class'=>'unstar'));
?>
	<?php echo $html->link($question['title'], array('controller'=>'questions','action'=>'view', $question['id'])); ?>
</h4>
In <?php echo $html->link($question['Category']['name'], array('controller'=> 'categories', 'action'=>'view', $question['Category']['id'])); ?> 
- Asked by <?php echo $html->link($question['User']['username'], array('controller'=> 'users', 'action'=>'view', $question['User']['id'])); ?> - <?php echo $question['answer_count']; ?> answers 
- <?php echo $time->timeAgoInWords($question['created']); ?>
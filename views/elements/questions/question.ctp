<h4><?php echo $html->link($question['Question']['title'], array('controller'=>'questions','action'=>'view', $question['Question']['id'])); ?></h4>
In <?php echo $html->link($question['Category']['name'], array('controller'=> 'categories', 'action'=>'view', $question['Category']['id'])); ?> 
- Asked by <?php echo $html->link($question['User']['username'], array('controller'=> 'users', 'action'=>'view', $question['User']['id'])); ?> - <?php echo $question['Question']['answer_count']; ?> answers 
- <?php echo $time->timeAgoInWords($question['Question']['created']); ?>
<div class="questions view">
	<h2><?php echo $question['Question']['title']; ?></h2>
	<p><?php echo $question['Question']['details']; ?></p>
	
<?php if (!$session->read('Auth.User.id') || $session->read('Auth.User.id') != $question['Question']['user_id']):
	$actions['Answer'] = array('controller'=>'answers','action'=>'add', $question['Question']['id']); ?>
	<?php echo $this->element('answers/add', array('questionId' => $question['Question']['id'])); ?>
<?php endif; ?>	

	<?php echo $this->element('answers/answers', array('answers'=>$question['Answer'], 'owner'=>$owner)); ?>
</div>

<?php 
if ($session->read('Auth.User.id') == $question['Question']['user_id']){
	$actions['Edit Question'] 		=  array('action'=>'edit', $question['Question']['id']);
	$actions['Delete Question'] 	= array('action'=>'delete', $question['Question']['id']);
}

$this->set(compact('actions')); 
?>
<div class="questions view">
	<h2><?php echo $question['Question']['title']; ?></h2>
	<p><?php echo $question['Question']['details']; ?></p>
	

	<?php echo $this->element('answers/add', array('questionId' => $question['Question']['id'])); ?>
	
<?php if ($session->read('Auth.User.id') == $question['Question']['user_id']): ?>
	<?php $this->set('actions', array(
		'Edit Question' => array('action'=>'edit', $question['Question']['id']),
		'Delete Question' => array('action'=>'delete', $question['Question']['id']),
	)); ?>
<?php elseif ($session->read('Auth.User') && $session->read('Auth.User.id') != $question['Question']['user_id']): ?>
	<?php $this->set('actions', array(
		'Answer' => array('controller'=>'answers','action'=>'add', $question['Question']['id']),
	)); ?>
<?php endif; ?>
	
	<?php echo $this->element('answers/answers', array('answers'=>$question['Answer'], 'owner'=>$owner)); ?>
</div>
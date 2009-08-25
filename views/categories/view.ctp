<div class="categories view">
	<h2>Category <?php echo $category['Category']['name']; ?></h2>

	<div class="questions home">
		<h2><?php echo $html->link('Questions', array('plugin'=>'answers','controller'=>'questions','action'=>'index'));?></h2>
		<?php echo $this->element('questions/questions', array('questions'=>$category['Question'])); ?>
	</div>
	<div class="consultants home">
		<h2><?php echo $html->link('Consultants', array('plugin'=>null,'controller'=>'consultants','action'=>'index'));?></h2>
		<?php echo $this->element('consultants/consultants', array('consultants'=>$category['Consultant'], 'size'=>190)); ?>
	</div>
</div>
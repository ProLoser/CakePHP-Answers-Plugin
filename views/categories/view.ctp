<div class="categories view">
	<h2><?php echo $category['Category']['name']; ?></h2>

	<div class="questions home">
		<h3><?php __('Questions');?></h3>
		<?php echo $this->element('questions/questions', array('questions'=>$category['Question'])); ?>
	</div>
	<div class="consultants home">
		<h3><?php __('Consultants');?></h3>
		<?php echo $this->element('consultants/consultants', array('consultants'=>$category['Consultant'], 'size'=>190)); ?>
	</div>
</div>
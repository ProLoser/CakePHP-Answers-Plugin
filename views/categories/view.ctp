<div class="categories view">
	<h2><?php echo $category['Category']['name']; ?></h2>

	<div class="related">
		<h3><?php __('Related Consultants');?></h3>
		<?php echo $this->element('consultants', array('consultants'=>$category['Consultant'])); ?>
		<h3><?php __('Related Questions');?></h3>
		<?php echo $this->element('questions', array('plugin'=>'answers','questions'=>$category['Question'])); ?>
	</div>
</div>
<div class="questionList">
<?php if (isset($paginator)): ?>
	<p style="display: none">
	<?php
	echo $paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?></p>
	<div class="paging">
		<?php echo $paginator->sort('created');?>
		<?php echo $paginator->sort('answer_count');?>
	</div>
<?php endif; ?>
	<ul>
	<?php
	$i = 0;
	foreach ($questions as $question):
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
				$options['question'] = (isset($question['Question'])) ? array_merge($question['Question'], $question) : $question;
				$options['plugin'] = 'answers';
				echo $this->element('questions/question', $options); 
			?>
		</li>
	<?php endforeach; ?>
	</ul>

<?php if (isset($paginator)): ?>
	<div class="paging">
		<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $paginator->numbers();?>
		<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
	</div>
<?php endif; ?>
</div>
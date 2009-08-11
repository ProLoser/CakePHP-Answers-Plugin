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
			if (isset($owner) && $owner) {
				$options['owner'] = true;
			}
			$options['answer'] = (isset($answer['Answer'])) ? array_merge($answer['Answer'], $answer) : $answer;
			$options['plugin'] = 'answers';
			echo $this->element('answers/answer', $options); 
		?>
	</li>
<?php endforeach; ?>
</ul>
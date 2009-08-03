<div class="categoriesMenu">
	<ul>
		<li class="header">Categories</li>
<?php
$i = 0;
foreach ($categoriesNavigation as $id => $category):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
		<li<?php echo $class;?>><?php echo $html->link($category, array('plugin'=>'answers','controller'=>'categories', 'action'=>'view', $id), null, null, false); ?></li>
<?php endforeach; ?>
	</ul>
</div>
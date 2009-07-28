<?php
class PointEvent extends AppModel {

	var $name = 'PointEvent';
	var $validate = array(
		'code' => array('notempty'),
		'description' => array('notempty'),
		'points' => array('numeric')
	);

}
?>
<?php
class Classroom extends AppModel {
	
	var $displayField = 'title';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Pupil' => array(
			'className' => 'Pupil',
			'foreignKey' => 'classroom_id',
			'dependent' => false,
		)
	);

}
?>
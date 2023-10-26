<?php
App::uses('AppModel', 'Model');
/**
 * DoctoravailableSlot Model
 *
 */
class DoctoravailableSlot extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $virtualFields = array(
	    'fulltime' => 'CONCAT(DoctoravailableSlot.start_time, " To ", DoctoravailableSlot.end_time)'
	);
	public $displayField = 'id';

}

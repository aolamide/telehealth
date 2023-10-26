<?php
App::uses('AppModel', 'Model');
/**
 * UploadtestResult Model
 *
 */
class UploadtestResult extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'uploaded_file';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'doctorid' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Select Doctor',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'uploaded_file' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Upload your test result',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}

<?php
App::uses('AppModel', 'Model');
/**
 * LabtestReport Model
 *
 */
class LabtestReport extends AppModel {

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
		'lab_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'provide lab Id',
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
		'diagnosis_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'provide diagnosis id',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}

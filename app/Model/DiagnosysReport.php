<?php
App::uses('AppModel', 'Model');
/**
 * DiagnosysReport Model
 *
 */
class DiagnosysReport extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'disease_name';

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
		'patientid' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Select Patient',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'disease_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter Disease Name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'diagnosys_detail' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Write about disease',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}

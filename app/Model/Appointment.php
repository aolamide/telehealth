<?php
App::uses('AppModel', 'Model');
/**
 * Appointment Model
 *
 */
class Appointment extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'appointment_date';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'locationid' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Select Location',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'serviceid' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Select Service',
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
		'appointment_date' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Select Date',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'appointment_availbility' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Select Time',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}

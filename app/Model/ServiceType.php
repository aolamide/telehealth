<?php
App::uses('AppModel', 'Model');
/**
 * ServiceType Model
 *
 */
class ServiceType extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'service_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'service_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter Service Name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'service_time' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter Service Time',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}

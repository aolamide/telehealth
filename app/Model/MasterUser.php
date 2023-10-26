<?php
App::uses('AppModel', 'Model');
/**
 * MasterUser Model
 *
 */
class MasterUser extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'fname';

	public $virtualFields = array(
    'name' => 'CONCAT(MasterUser.fname, " ", MasterUser.lname)'
);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'fname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter First Name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter User Name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_pass' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter Password',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'gender' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Select Patient Gender',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'patient_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter Patient ID',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'dob' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Your Date of Birth',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mobile_no' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter Mobile No',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'emrg_no' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter Emergency No',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'zipcode' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter Post Code',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}

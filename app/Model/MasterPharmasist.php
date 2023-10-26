<?php
App::uses('AppModel', 'Model');
/**
 * MasterDoctor Model
 *
 */
class MasterPharmasist extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'master_users';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'fname';

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
		'email_id' => array(
        //'isUnique' => array (
          //  'rule' => 'isUnique',
         //   'message' => 'This username already exists.'),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter your Email Address',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'email' => array(
				'rule' => array('email'),
				'message' => 'Enter Valid Email Address',
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
				'message' => 'Select Gender',
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
		'zipcode' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter Zip Code',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}

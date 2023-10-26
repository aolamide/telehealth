<?php
App::uses('AppModel', 'Model');
/**
 * MailToSubscriber Model
 *
 */
class MailToSubscriber extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'mail_to_subscriber';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'mail_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'mail_list';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'brandlist' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Select Brands',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'categorylist' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Select Categories',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'countylist' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Select Counties',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'compose_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Select your Message',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mail_list' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Select User To send Mail',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}

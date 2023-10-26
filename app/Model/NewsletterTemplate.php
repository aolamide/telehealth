<?php
App::uses('AppModel', 'Model');
/**
 * NewsletterTemplate Model
 *
 */
class NewsletterTemplate extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'newsletter_template';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'compose_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'mail_subject';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'mail_subject' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter Subject',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mail_body' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Write body of the Compose',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}

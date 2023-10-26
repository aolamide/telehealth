<?php
App::uses('AppModel', 'Model');
/**
 * SocialIcon Model
 *
 */
class NewsLetter extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'news_letter_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'user_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		
		/*'news_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter Name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
		
		'news_email' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter Email ID',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'email' => array(
				'rule' => array('email'),
				'message' => 'Enter a Valid Email ID',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => 'isUnique',
				'required' => 'create',
				'message' => 'Email ID Must be Unique',
			),
		),
	);
}

<?php
App::uses('AppModel', 'Model');
class AdminUser extends AppModel {
	public $primaryKey = 'uid';
	public $displayField = 'full_name';

	public $validate = array(
		'full_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Full Name is required !',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mail_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'E-Mail ID is required !',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
       		 'rule' => 'isUnique',
       		 'required' => 'create',
       		 'message' => 'E-Mail ID already exists !',
   			 ),
			'email' => array(
				'rule' => array('email'),
				'message' => 'Must be a valid E-Mail ID !',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'User ID is required !',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
       		 'rule' => 'isUnique',
       		 'required' => 'create',
       		 'message' => 'User ID already exists !',
   			 ),

		),
		'pass' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Password is required !',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength' => array(
				'rule' => array('minLength',5),
				'message' => 'Password must have minimum length 5 !',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}

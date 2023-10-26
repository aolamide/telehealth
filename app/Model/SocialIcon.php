<?php
App::uses('AppModel', 'Model');
/**
 * SocialIcon Model
 *
 */
class SocialIcon extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'social_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'social_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		
		'social_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
		//'social_link' => array(
			//'notEmpty' => array(
			//	'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
			//'rule' => '/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i',
			//'rule' => '/\b(?:(?:https?|ftp):\/\/www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i',
			
        	//'message' => 'Enter a valid Link.'
		//),
	);
}

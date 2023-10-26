<?php
App::uses('AppModel', 'Model');
/**
 * Banner Model
 *
 */
class Banner extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'banner_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'banner_title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'banner_title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => 'isUnique',
				'required' => 'create',
				'message' => 'Banner must be Unique',
			),
		),
		'banner_img' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}

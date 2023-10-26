<?php
App::uses('AppModel', 'Model');
/**
 * MasterMenu Model
 *
 */
class MasterMenu extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'menu_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'menu_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter Menu Name',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'menu_link' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter Menu Link',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'menu_position' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter Position',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}

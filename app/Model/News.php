<?php
App::uses('AppModel', 'Model');
/**
 * News Model
 *
 */
class News extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'news_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'news_title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'news_title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter Title',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'news_content' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'News Description Must be fill out',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'news_img' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Upload Image',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'extension' => array(
            'rule' => array('extension', array('jpeg', 'jpg' , 'JPEG', 'png', 'PNG', 'gif', 'GIF')),
            'message' => 'Upload valid Image',
			'on' => 'create', // Limit validation to 'create' or 'update' operations
        ),
		),
	);
}

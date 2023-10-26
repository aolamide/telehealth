<?php
App::uses('AppModel', 'Model');
class AdminPage extends AppModel {

	public $primaryKey = 'pid';
	public $displayField = 'page_name';
	public $validate = array(
		'page_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Page Name is required !',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
       		 'rule' => 'isUnique',
       		 'required' => 'create',
       		 'message' => 'Page Name already exists !',
   			 ),


		),
		/*'page_title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Page Title is required !',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
		'page_desc' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Page Content is required !',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}

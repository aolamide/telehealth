<?php
App::uses('AppModel', 'Model');
/**
 * Notice Model
 *
 */
class Notice extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'notice';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'notice_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'notice_name';

}

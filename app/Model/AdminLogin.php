<?php
App::uses('AppModel', 'Model');
/**
 * AdminLogin Model
 *
 */
class AdminLogin extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'admin_users';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'uid';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'full_name';

}

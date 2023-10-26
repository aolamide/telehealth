<?php
App::uses('AppModel', 'Model');
/**
 * Dashboard Model
 *
 */
class Dashboard extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'master_users';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'fname';

}

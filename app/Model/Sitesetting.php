<?php
App::uses('AppModel', 'Model');
/**
 * SalesView Model
 *
 */
class Sitesetting extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'site_setting';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id';

}

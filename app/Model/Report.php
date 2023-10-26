<?php
App::uses('AppModel', 'Model');
/**
 * Report Model
 *
 */
class Report extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'contacts';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'first_name';

}

<?php
App::uses('AppModel', 'Model');
/**
 * Appdetail Model
 *
 */
class Appdetail extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'appointments';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'appointment_date';

}

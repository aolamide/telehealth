<?php
App::uses('AppModel', 'Model');
/**
 * MasterState Model
 *
 */
class MasterState extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'location_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'location_name';

}

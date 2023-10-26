<?php
App::uses('AppModel', 'Model');
/**
 * MasterCountry Model
 *
 */
class MasterCountry extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'country_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'country_name';

}

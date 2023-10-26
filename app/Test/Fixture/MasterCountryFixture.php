<?php
/**
 * MasterCountryFixture
 *
 */
class MasterCountryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'country_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'country_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'country_short_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'country_id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'country_id' => 1,
			'country_name' => 'Lorem ipsum dolor sit amet',
			'country_short_name' => 'Lorem ipsum dolor sit amet'
		),
	);

}

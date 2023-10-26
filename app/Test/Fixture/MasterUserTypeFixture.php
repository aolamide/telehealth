<?php
/**
 * MasterUserTypeFixture
 *
 */
class MasterUserTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ut_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'ut_id', 'unique' => 1)
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
			'ut_id' => 1,
			'user_type' => 'Lorem ip'
		),
	);

}

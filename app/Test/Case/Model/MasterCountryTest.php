<?php
App::uses('MasterCountry', 'Model');

/**
 * MasterCountry Test Case
 *
 */
class MasterCountryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.master_country'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MasterCountry = ClassRegistry::init('MasterCountry');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MasterCountry);

		parent::tearDown();
	}

}

<?php
App::uses('MasterUserType', 'Model');

/**
 * MasterUserType Test Case
 *
 */
class MasterUserTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.master_user_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MasterUserType = ClassRegistry::init('MasterUserType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MasterUserType);

		parent::tearDown();
	}

}

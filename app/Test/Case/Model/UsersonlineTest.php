<?php
App::uses('Usersonline', 'Model');

/**
 * Usersonline Test Case
 *
 */
class UsersonlineTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.usersonline'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Usersonline = ClassRegistry::init('Usersonline');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Usersonline);

		parent::tearDown();
	}

}

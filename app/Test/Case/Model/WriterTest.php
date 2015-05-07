<?php
App::uses('Writer', 'Model');

/**
 * Writer Test Case
 *
 */
class WriterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.writer',
		'app.book',
		'app.category',
		'app.user',
		'app.group',
		'app.detail',
		'app.order',
		'app.books_order',
		'app.categories_user',
		'app.vote',
		'app.books_writer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Writer = ClassRegistry::init('Writer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Writer);

		parent::tearDown();
	}

}

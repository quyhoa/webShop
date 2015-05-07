<?php
App::uses('Vote', 'Model');

/**
 * Vote Test Case
 *
 */
class VoteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.vote',
		'app.book',
		'app.category',
		'app.user',
		'app.group',
		'app.detail',
		'app.order',
		'app.books_order',
		'app.categories_user',
		'app.writer',
		'app.books_writer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Vote = ClassRegistry::init('Vote');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Vote);

		parent::tearDown();
	}

}

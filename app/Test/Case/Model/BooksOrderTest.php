<?php
App::uses('BooksOrder', 'Model');

/**
 * BooksOrder Test Case
 *
 */
class BooksOrderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.books_order',
		'app.book',
		'app.category',
		'app.vote',
		'app.order',
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
		$this->BooksOrder = ClassRegistry::init('BooksOrder');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BooksOrder);

		parent::tearDown();
	}

}

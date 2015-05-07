<?php
App::uses('CategoriesUser', 'Model');

/**
 * CategoriesUser Test Case
 *
 */
class CategoriesUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categories_user',
		'app.category',
		'app.book',
		'app.vote',
		'app.order',
		'app.books_order',
		'app.writer',
		'app.books_writer',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategoriesUser = ClassRegistry::init('CategoriesUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoriesUser);

		parent::tearDown();
	}

}

<?php
/**
 * CategoriesUserFixture
 *
 */
class CategoriesUserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'category_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'category_id' => 1,
			'user_id' => 1
		),
	);

}

<?php
/**
 * BookFixture
 *
 */
class BookFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'category_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'title' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'image' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'slug' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'descriptions' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'price' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'sale_price' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'discount' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'pages' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'link_download' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'amount' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'amount_view' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'status' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1),
		'amount_read' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'id' => 1,
			'category_id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'image' => 'Lorem ipsum dolor sit amet',
			'slug' => 'Lorem ipsum dolor sit amet',
			'descriptions' => 'Lorem ipsum dolor sit amet',
			'price' => 1,
			'sale_price' => 1,
			'discount' => 1,
			'pages' => 1,
			'link_download' => 'Lorem ipsum dolor sit amet',
			'amount' => 1,
			'amount_view' => 1,
			'created' => '2015-03-23 11:50:32',
			'status' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'amount_read' => 1
		),
	);

}

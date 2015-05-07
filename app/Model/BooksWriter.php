<?php
App::uses('AppModel', 'Model');
/**
 * BooksWriter Model
 *
 * @property Book $Book
 * @property Writer $Writer
 */
class BooksWriter extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Book' => array(
			'className' => 'Book',
			'foreignKey' => 'book_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Writer' => array(
			'className' => 'Writer',
			'foreignKey' => 'writer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

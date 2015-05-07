<?php
App::uses('AppModel', 'Model');
/**
 * Order Model
 *
 * @property User $User
 * @property Book $Book
 */
class Order extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $validate = array(
		'begin'=>array(
			'rule'=>array('notEmpty'),
			'message'=>'Ngày không được để rỗng'
			),
		'end'=>array(
			'rule'=>array('notEmpty'),
			'message'=>'Ngày không được để rổng'
			),
		);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Book' => array(
			'className' => 'Book',
			'joinTable' => 'books_orders',
			'foreignKey' => 'order_id',
			'associationForeignKey' => 'book_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}

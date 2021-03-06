<?php
App::uses('AppModel', 'Model');

App::import('Vendor', 'QueryBot');
/**
 * Ingredient Model
 *
 * @property Contain $Contain
 * @property Own $Own
 * @property Price $Price
 * @property Proof $Proof
 */
class Ingredient extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'ingredient';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'ingredient_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'brand';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Contain' => array(
			'className' => 'Contain',
			'foreignKey' => 'ingredient_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Own' => array(
			'className' => 'Own',
			'foreignKey' => 'ingredient_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Price' => array(
			'className' => 'Price',
			'foreignKey' => 'ingredient_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Proof' => array(
			'className' => 'Proof',
			'foreignKey' => 'ingredient_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
}

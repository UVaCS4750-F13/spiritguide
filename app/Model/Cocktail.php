<?php
App::uses('AppModel', 'Model');
/**
 * Cocktail Model
 *
 * @property Contain $Contain
 * @property Favorite $Favorite
 * @property Label $Label
 * @property UserRating $UserRating
 */
class Cocktail extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'cocktail';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'cocktail_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Contain' => array(
			'className' => 'Contain',
			'foreignKey' => 'cocktail_id',
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
		'Favorite' => array(
			'className' => 'Favorite',
			'foreignKey' => 'cocktail_id',
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
		'Label' => array(
			'className' => 'Label',
			'foreignKey' => 'cocktail_id',
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
		'UserRating' => array(
			'className' => 'UserRating',
			'foreignKey' => 'cocktail_id',
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

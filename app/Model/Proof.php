<?php
App::uses('AppModel', 'Model');
/**
 * Proof Model
 *
 * @property Ingredient $Ingredient
 */
class Proof extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'proof';

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
	public $displayField = 'proof';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ingredient' => array(
			'className' => 'Ingredient',
			'foreignKey' => 'ingredient_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

<?php
App::uses('AppModel', 'Model');
/**
 * Contain Model
 *
 * @property Cocktail $Cocktail
 * @property Ingredient $Ingredient
 */
class Contain extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'cocktail_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cocktail' => array(
			'className' => 'Cocktail',
			'foreignKey' => 'cocktail_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ingredient' => array(
			'className' => 'Ingredient',
			'foreignKey' => 'ingredient_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

<?php
App::uses('AppModel', 'Model');
/**
 * UserRating Model
 *
 * @property User $User
 * @property Cocktail $Cocktail
 */
class UserRating extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'user_rating';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'user_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'stars';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
		),
		'Cocktail' => array(
			'className' => 'Cocktail',
			'foreignKey' => 'cocktail_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

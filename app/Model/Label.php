<?php
App::uses('AppModel', 'Model');
/**
 * Label Model
 *
 * @property Cocktail $Cocktail
 * @property Tag $Tag
 */
class Label extends AppModel {

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
	public $displayField = 'tag_id';


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
		'Tag' => array(
			'className' => 'Tag',
			'foreignKey' => 'tag_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

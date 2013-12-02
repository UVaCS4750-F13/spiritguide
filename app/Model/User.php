<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Favorite $Favorite
 * @property Own $Own
 */
class User extends AppModel {

	public $validate = array(
		'username' 		=> array(
			'unique'		=>	array(
				'rule'			=>	'isUnique',
				'message' 		=>	'This Username has already been taken'
			),
			'alphanum'		=>	array(
				'rule'			=> 	'alphaNumeric',
				'message'		=>	'Usernames may only consist of alphanumeric characters'
			),
			'between'		=>	array(
				'rule'			=>	array('between', 5, 20),
				'message'		=>	'Username must be between 5 and 20 characters'
			)
		),
		'password'		=>	array(
			'alphanum'		=>	array(
				'rule'			=> 	'alphaNumeric',
				'message'		=>	'Passwords may only consist of alphanumeric characters'
			),
			'between'		=>	array(
				'rule'			=>	array('between', 5, 20),
				'message'		=>	'Passwords must be between 5 and 20 characters'
			)
		),
		'display_name'	=>	array(
			'alphanum'		=>	array(
				'rule'			=> 	'alphaNumeric',
				'message'		=>	'Display names may only consist of alphanumeric characters'
			),
			'between'		=>	array(
				'rule'			=>	array('between', 5, 20),
				'message'		=>	'Display names must be between 5 and 20 characters'
			)
		),
		'email'			=>	array(
			'email'			=>	array(
				'rule'			=>	array('email', true),
				'message'		=>	'Not a valid email address'
			),
			'unique'		=>	array(
				'rule'			=>	'isUnique',
				'message' 		=>	'A User with this email already exists'
			)
		)
	);
	
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'user';

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
	public $displayField = 'display_name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Favorite' => array(
			'className' => 'Favorite',
			'foreignKey' => 'user_id',
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
			'foreignKey' => 'user_id',
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


	public function beforeSave($options = array()) {
    	if (isset($this->data[$this->alias]['password'])) {
        	$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    	}
    	return true;
	}
}

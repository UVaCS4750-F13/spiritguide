<?php
App::uses('AppModel', 'Model');
/**
 * Profile Model
 *
 */
class Profile extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'profile';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'user_id';

}

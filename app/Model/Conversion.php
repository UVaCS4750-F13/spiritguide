<?php
App::uses('AppModel', 'Model');
/**
 * Conversion Model
 *
 */
class Conversion extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'conversion';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'unit';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'unit';

}

<?php
/**
 * Color Fixture
 */
class ColorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'modified' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'name' => 'Absolute Zero',
			'created' => '2015-11-10 18:09:40',
			'modified' => '2015-11-10 18:09:40'
		),
		array(
			'id' => '2',
			'name' => 'Acid green',
			'created' => '2015-11-10 18:09:40',
			'modified' => '2015-11-10 18:09:40'
		),
		array(
			'id' => '3',
			'name' => 'Aero',
			'created' => '2015-11-10 18:09:40',
			'modified' => '2015-11-10 18:09:40'
		),
		array(
			'id' => '4',
			'name' => 'Alabama crimson',
			'created' => '2015-11-10 18:09:40',
			'modified' => '2015-11-10 18:09:40'
		),
		array(
			'id' => '5',
			'name' => 'Alloy orange',
			'created' => '2015-11-10 18:09:40',
			'modified' => '2015-11-10 18:09:40'
		),
		array(
			'id' => '6',
			'name' => 'Amaranth deep purple',
			'created' => '2015-11-10 18:09:40',
			'modified' => '2015-11-10 18:09:40'
		),
		array(
			'id' => '7',
			'name' => 'Android green',
			'created' => '2015-11-10 18:09:40',
			'modified' => '2015-11-10 18:09:40'
		),
		array(
			'id' => '8',
			'name' => 'Asparagus',
			'created' => '2015-11-10 18:09:40',
			'modified' => '2015-11-10 18:09:40'
		),
		array(
			'id' => '9',
			'name' => 'Baby blue',
			'created' => '2015-11-10 18:09:40',
			'modified' => '2015-11-10 18:09:40'
		),
		array(
			'id' => '10',
			'name' => 'Baby pink',
			'created' => '2015-11-10 18:09:40',
			'modified' => '2015-11-10 18:09:40'
		),
	);

}

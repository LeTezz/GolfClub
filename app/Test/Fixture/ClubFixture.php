<?php
/**
 * Club Fixture
 */
class ClubFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'year_established' => array('type' => 'date', 'null' => false, 'default' => null),
		'address' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'details' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'name' => 'Terrebonne Supreme',
			'year_established' => '2015-09-18',
			'address' => '1229 richard',
			'details' => 'Club de golf Ã  Terrebonne',
			'user_id' => '0'
		),
		array(
			'id' => '3',
			'name' => 'Terrebonne Plaza',
			'year_established' => '2015-10-07',
			'address' => '1234 des lolipop',
			'details' => 'asdssdgsdfs',
			'user_id' => '1'
		),
		array(
			'id' => '4',
			'name' => 'Terrebonne Villa',
			'year_established' => '2015-10-07',
			'address' => '1234 des lolipop',
			'details' => 'asdasdasd',
			'user_id' => '3'
		),
	);

}

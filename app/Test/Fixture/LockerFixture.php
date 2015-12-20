<?php
/**
 * Locker Fixture
 */
class LockerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'club_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'location' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'rental_amount' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'details' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'club_id' => '1',
			'location' => '3eme etage',
			'rental_amount' => '5',
			'details' => 'Bleu'
		),
		array(
			'id' => '2',
			'club_id' => '1',
			'location' => '2ieme etage',
			'rental_amount' => '10',
			'details' => 'Jaune'
		),
	);

}

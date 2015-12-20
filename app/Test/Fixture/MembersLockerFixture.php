<?php
/**
 * MembersLocker Fixture
 */
class MembersLockerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'locker_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'member_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'rented_from_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'rented_to_date' => array('type' => 'date', 'null' => false, 'default' => null),
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
			'locker_id' => '1',
			'member_id' => '1',
			'rented_from_date' => '2015-09-18',
			'rented_to_date' => '2015-09-20'
		),
		array(
			'id' => '3',
			'locker_id' => '2',
			'member_id' => '1',
			'rented_from_date' => '0000-00-00',
			'rented_to_date' => '0000-00-00'
		),
		array(
			'id' => '6',
			'locker_id' => '1',
			'member_id' => '4',
			'rented_from_date' => '0000-00-00',
			'rented_to_date' => '0000-00-00'
		),
	);

}

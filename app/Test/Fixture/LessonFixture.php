<?php
/**
 * Lesson Fixture
 */
class LessonFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'member_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'date' => array('type' => 'date', 'null' => false, 'default' => null),
		'fee_amount' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'subcategory_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'id' => '2',
			'member_id' => '1',
			'name' => 'Premiere lesson',
			'date' => '2015-09-24',
			'fee_amount' => '5',
			'subcategory_id' => '8'
		),
		array(
			'id' => '3',
			'member_id' => '1',
			'name' => 'asfsdfsdfs',
			'date' => '2015-11-11',
			'fee_amount' => '43',
			'subcategory_id' => '3'
		),
	);

}

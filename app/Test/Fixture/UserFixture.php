<?php
/**
 * User Fixture
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'role' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'date', 'null' => false, 'default' => null),
		'modified' => array('type' => 'date', 'null' => false, 'default' => null),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => null),
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
			'username' => 'admin',
			'password' => '$2a$10$gyHbAs8tcLls9avuA1vAk.mJqcu5PywM3c28sCqN1SasQdDSTJIkC',
			'role' => 'admin',
			'email' => 'admin@admin.com',
			'created' => '2015-09-24',
			'modified' => '2015-11-11',
			'active' => 1
		),
		array(
			'id' => '21',
			'username' => 'user',
			'password' => '$2a$10$5Hw5ZbYhzswGrXddQrFSvO/WepfTPPb1IvirP7z5jerg83twIS.We',
			'role' => 'visiteur',
			'email' => 'tristan.santerre@live.ca',
			'created' => '2015-11-11',
			'modified' => '2015-11-11',
			'active' => 1
		),
		array(
			'id' => '22',
			'username' => 'user1',
			'password' => '$2a$10$Hbxf6m6J3vMUS3YMrPtwHOxwSzwOYM1kO6wyxRTz6u5QpJG8PqjGe',
			'role' => 'visiteur',
			'email' => 'tristan.santerre@live.ca',
			'created' => '2015-11-11',
			'modified' => '2015-11-11',
			'active' => 0
		),
	);

}

<?php
App::uses('Club', 'Model');

/**
 * Club Test Case
 */
class ClubTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.club',
		'app.locker',
		'app.member',
		'app.lesson',
		'app.subcategory',
		'app.category',
		'app.members_locker'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Club = ClassRegistry::init('Club');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Club);

		parent::tearDown();
	}

/**
 * testIsOwnedBy method
 *
 * @return void
 */
	public function testIsOwnedByTrue() {
		$testIsOwnedBy = $this->Club->isOwnedBy(3,1);
                $this->assertTrue($testIsOwnedBy);
	}
        
        public function testIsOwnedByFalse() {
		$testIsOwnedBy = $this->Club->isOwnedBy(3,2);
                $this->assertFalse($testIsOwnedBy);
	}

}

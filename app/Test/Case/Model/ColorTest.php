<?php
App::uses('Color', 'Model');

/**
 * Color Test Case
 */
class ColorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.color'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Color = ClassRegistry::init('Color');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Color);

		parent::tearDown();
	}

/**
 * testGetColorNames method
 *
 * @return void
 */
	public function testAutoCompleteUneLettre() {
		$testColorNames = $this->Color->getColorNames("b");
                $this->assertEqual($testColorNames, array("9" => "Baby blue", "10" => "Baby pink"));
	}
        
        public function testAutoCompleteDeuxLettres() {
		$testColorNames = $this->Color->getColorNames("ab");
                $this->assertEqual($testColorNames, array("1" => "Absolute Zero"));
	}
        
        public function testAutoCompleteUneLettreInexistante() {
		$testColorNames = $this->Color->getColorNames("v");
                $this->assertEqual($testColorNames, array());
	}
        
        public function testAutoCompletePasLettre() {
		$testColorNames = $this->Color->getColorNames("");
                $this->assertFalse($testColorNames);
	}

}

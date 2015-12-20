<?php
App::uses('Subcategory', 'Model');

/**
 * Subcategory Test Case
 */
class SubcategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.subcategory',
		'app.category',
		'app.lesson',
		'app.member',
		'app.club',
		'app.locker',
		'app.members_locker'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Subcategory = ClassRegistry::init('Subcategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Subcategory);

		parent::tearDown();
	}
        
        public function testGetSubcategoriesByCategoryMarche() {
        $result = $this->Subcategory->getSubcategoriesByCategory(1);
//            debug($result); die();
        $expected = array(
            (int) 1 => 'Expliquation des regles',
            (int) 2 => 'Expliquation des batons',
            (int) 3 => 'Premier examen'
        );
        $this->assertEquals($expected, $result);
//		$this->markTestIncomplete('testGetSubcategoriesByCategory not implemented.');
    }
    
    public function testGetSubcategoriesByCategoryVide() {
        $result = $this->Subcategory->getSubcategoriesByCategory(6);
//            debug($result); die();
        $this->assertEmpty($result);
//		$this->markTestIncomplete('testGetSubcategoriesByCategory not implemented.');
    }
    
    public function testGetSubcategoriesByCategoryAucunParametre() {
        $result = $this->Subcategory->getSubcategoriesByCategory();
//            debug($result); die();
        $this->assertEmpty($result);
//		$this->markTestIncomplete('testGetSubcategoriesByCategory not implemented.');
    }
    
    

}

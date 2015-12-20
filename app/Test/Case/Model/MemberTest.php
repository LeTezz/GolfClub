<?php
App::uses('Member', 'Model');

/**
 * Member Test Case
 */
class MemberTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.member',
		'app.club',
		'app.locker',
		'app.members_locker',
		'app.lesson',
		'app.subcategory',
		'app.category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Member = ClassRegistry::init('Member');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Member);

		parent::tearDown();
	}

/**
 * testProcessImageUpload method
 *
 * @return void
 */
        
        //TEST VALIDATION
        
        public function testValidationClubIdNumeric (){
            $data = array(
			'Member' => array(
				'club_id' => 'peanut',
				'first_name' => 'tristan',
                                'last_name' => 'santerre',
                                'phone' => '438-492-6052',
                                'email' => 'tristan.santerre@live.ca',
                                'address' => '2037 cote terrebonne'
                            )
                );
            
            $result = $this->Member->save($data);
            $this->assertFalse($result);
        }
        
        public function testValidationEmail (){
            $data = array(
			'Member' => array(
				'club_id' => '1',
				'first_name' => 'tristan',
                                'last_name' => 'santerre',
                                'phone' => '438-492-6052',
                                'email' => 'lalala',
                                'address' => '2037 cote terrebonne'
                            )
                );
            
            $result = $this->Member->save($data);
            $this->assertFalse($result);
        }
        
        public function testValidationNomVide (){
            $data = array(
			'Member' => array(
				'club_id' => '1',
				'first_name' => 'tristan',
                                'last_name' => '',
                                'phone' => '438-492-6052',
                                'email' => 'tristan.santerre@live.ca',
                                'address' => '2037 cote terrebonne'
                            )
                );
            
            $result = $this->Member->save($data);
            $this->assertFalse($result);
        }
        
        public function testValidationToutValide (){
            $data = array(
			'Member' => array(
				'club_id' => '1',
				'first_name' => 'tristan',
                                'last_name' => 'santerre',
                                'phone' => '438-492-6052',
                                'email' => 'tristan.santerre@live.ca',
                                'address' => '2037 cote terrebonne',
                                'member_image' => '',
                            )
                );
            
            $result = $this->Member->save($data);

		// Test successful insert
		$this->assertArrayHasKey('Member', $result);

		// Get the count in the DB
		$result = $this->Member->find('count', array(
			'conditions' => array(
				'Member.club_id' => '1',
				'Member.first_name' => 'tristan',
                                'Member.last_name' => 'santerre',
                                'Member.phone' => '438-492-6052',
                                'Member.email' => 'tristan.santerre@live.ca',
                                'Member.address' => '2037 cote terrebonne',
                                'member_image' => '',
			),
		));

		// Test DB entry
		$this->assertEqual($result, 1);
        }
        
        
        //TEST IMAGE
        
       public function testEmptyForm() {
		// Build the data to save
		$data = array(
			'Member' => array(
				'club_id' => '',
				'first_name' => '',
                                'last_name' => '',
                                'phone' => '',
                                'email' => '',
                                'address' => '',
                                'member_image' => ''
                            )
		);

		// Attempt to save
		$result = $this->Member->save($data);

		// Test save failed
		$this->assertFalse($result);
	}
        
        //TEST QUI NE MARCHE PAS (MIMETYPE)
        /**
        
        public function testFormWithEmptyFile() {
		// Build the data to save along with an empty file
		$data = array('Member' => array(
			'club_id' => '1',
			'first_name' => 'tristan',
                        'last_name' => 'santerre',
                        'phone' => '438-492-6052',
                        'email' => 'tristan.santerre@live.ca',
                        'address' => '2037 cote terrebonne',
                        'member_image' => array(
				'name' => '',
				'type' => '',
				'tmp_name' => '',
				'error' => 4,
				'size' => 0,
			),
		));

		// Attempt to save
		$result = $this->Member->save($data);

		// Test successful insert
		$this->assertArrayHasKey('Member', $result);

		// Get the count in the DB
		$result = $this->Member->find('count', array(
			'conditions' => array(
				'Member.club_id' => '1',
				'Member.first_name' => 'tristan',
                                'Member.last_name' => 'santerre',
                                'Member.phone' => '438-492-6052',
                                'Member.email' => 'tristan.santerre@live.ca',
                                'Member.address' => '2037 cote terrebonne',
			),
		));

		// Test DB entry
		$this->assertEqual($result, 1);
	}
        
        public function testProcessImageUploadCorrect() {
        // Create a stub for the Contact Model class
        $stub = $this->getMockForModel('Member', array('is_uploaded_file', 'move_uploaded_file'));
        // Always return TRUE for the 'is_uploaded_file' function
        $stub->expects($this->any())
                ->method('is_uploaded_file')
                ->will($this->returnValue(TRUE));
        // Copy the file instead of 'move_uploaded_file' to allow testing
        $stub->expects($this->any())
                ->method('move_uploaded_file')
                ->will($this->returnCallback('copy'));
        $data = array(
            'Member' => array(
				'club_id' => '1',
				'first_name' => 'tristan',
                                'last_name' => 'santerre',
                                'phone' => '438-492-6052',
                                'email' => 'tristan.santerre@live.ca',
                                'address' => '2037 cote terrebonne',
                                'member_image' => array(
                                                    'name' => 'TestFile.jpg',
                                                    'type' => 'image/jpeg',
                                                    'tmp_name' => ROOT . DS . APP_DIR . DS . 'Test' . DS . 'Case' . DS . 'Model' . DS . 'TestFile.jpg',
                                                    'error' => 0,
                                                    'size' => '845941'
                                                )
            )
        );
        
        // Attempt to save
	$result = $stub->save($data);
        
        
	// Test successful insert
	$this->assertArrayHasKey('Member', $result);
	// Get the count in the DB
	$result = $this->Member->find('count', array(
		'conditions' => array(
			'Member.club_id' => '1',
			'Member.first_name' => 'tristan',
                        'Member.last_name' => 'santerre',
                        'Member.phone' => '438-492-6052',
                        'Member.email' => 'tristan.santerre@live.ca',
                        'Member.address' => '2037 cote terrebonne',
			'Member.member_image' => 'uploads/TestFile.jpg'
		),
	));
	// Test DB entry
	$this->assertEqual($result, 1);
	// Test uploaded file exists
	$this->assertFileExists(WWW_ROOT.'img'.DS.'uploads'.DS.'TestFile.jpg');
    }
    
    public function testFormWithInvalidFile() {
		// Create a stub for the Contact Model class
		$stub = $this->getMockForModel('Member', array('is_uploaded_file','move_uploaded_file'));

		// Always return TRUE for the 'is_uploaded_file' function
		$stub->expects($this->any())
			->method('is_uploaded_file')
			->will($this->returnValue(TRUE));
		// Copy the file instead of 'move_uploaded_file' to allow testing
		$stub->expects($this->any())
			->method('move_uploaded_file')
			->will($this->returnCallback('copy'));

		// Build the data to save along with a sample file
		$data = array(
            'Member' => array(
				'club_id' => '1',
				'first_name' => 'tristan',
                                'last_name' => 'santerre',
                                'phone' => '438-492-6052',
                                'email' => 'tristan.santerre@live.ca',
                                'address' => '2037 cote terrebonne',
                                'member_image' => array(
                                                    'name' => 'TestFile.txt',
                                                    'type' => 'text/plain',
                                                    'tmp_name' => ROOT . DS . APP_DIR . DS . 'Test' . DS . 'Case' . DS . 'Model' . DS . 'TestFile.txt',
                                                    'error' => 0,
                                                    'size' => 19
                                                )
            )
        );

		// Attempt to save
		$result = $stub->save($data);

		// Test failure
		$this->assertFalse($result);

		// Test uploaded file does not exists
		$this->assertFileNotExists(WWW_ROOT.'uploads'.DS.'TestFile.txt');
	}
        
        */
        
        
}

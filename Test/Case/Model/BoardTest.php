<?php
App::uses('Board', 'Model');

/**
 * Board Test Case
 *
 */
class BoardTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.board', 'app.personal');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Board = ClassRegistry::init('Board');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Board);

		parent::tearDown();
	}
/** testBoardInstance method */
	public function testBoardInstance(){
		$this->assertTrue(is_a($this->Board,'Board'));
	}


/**
 * testMaxRecords method
 *
 * @return void
 */
	public function testMaxRecords() {

	}

	public function testBoardFind(){
		$this->Board->recursive = -1;
		$results = $this->Board->find('first');
		$this->assertTrue(!empty($results));

		$expected = array(
			'Board'=>array(
				'id' => 1
			)
		);
		$this->assertEqual($results['Board']['id'],$expected['Board']['id']);
	}

}

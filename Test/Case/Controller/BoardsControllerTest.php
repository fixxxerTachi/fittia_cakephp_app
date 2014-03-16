<?php
App::uses('BoardsController', 'Controller');

/**
 * TestBoardsController *
 */
class TestBoardsController extends BoardsController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * BoardsController Test Case
 *
 */
class BoardsControllerTestCase extends CakeTestCase {
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
		$this->Boards = new TestBoardsController();
		$this->Boards->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Boards);

		parent::tearDown();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$res = $this->Boards->Board->find('all');
		$this->assertNotNull($res[0]['Board']);
		$this->assertNotNull($res[0]['Board']);
		$this->assertEqual($res[0]['Board']['id'],1);
		$this->assertEqual($res[0]['Board']['id'],1);
	}
/**
 * testAddRecord method
 *
 * @return void
 */
	public function testAddRecord() {

	}
/**
 * testSearch method
 *
 * @return void
 */
	public function testSearch() {

	}
/**
 * testSearch1 method
 *
 * @return void
 */
	public function testSearch1() {

	}
/**
 * testHasOne method
 *
 * @return void
 */
	public function testHasOne() {

	}
/**
 * testBelongsTo method
 *
 * @return void
 */
	public function testBelongsTo() {

	}
/**
 * testHasMany method
 *
 * @return void
 */
	public function testHasMany() {

	}
/**
 * testBoard method
 *
 * @return void
 */
	public function testBoard() {

	}
/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {

	}
/**
 * testShow method
 *
 * @return void
 */
	public function testShow() {

	}
/**
 * testShow2 method
 *
 * @return void
 */
	public function testShow2() {

	}
/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {

	}


}

<?php
App::uses('Joke', 'Model');

/**
 * Joke Test Case
 *
 */
class JokeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.joke', 'app.user', 'app.role');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Joke = ClassRegistry::init('Joke');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Joke);

		parent::tearDown();
	}

}

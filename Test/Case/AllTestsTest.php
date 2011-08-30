<?php
/**
 * AllTests class
 *
 */
class AllTestsTest extends PHPUnit_Framework_TestSuite {

/**
 * Suite define the tests for this suite
 *
 * @return void
 */
	public static function suite() {
		$suite = new PHPUnit_Framework_TestSuite('All FormTitles Tests');

		$path = App::pluginPath('FormTitles') . 'Test' . DS . 'Case' . DS;

		$suite->addTestFile($path . DS . 'View'. DS . 'Helper'. DS. 'FormTitlesHelperTest.php');
		$suite->addTestFile($path . DS . 'Model'. DS . 'Behavior'. DS. 'SchemAddBehaviorTest.php');

		return $suite;
	}
}

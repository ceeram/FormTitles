<?php

App::uses('FormTitlesHelper', 'FormTitles.View/Helper');
App::uses('FormHelperTest', 'Test/Case/View/Helper');

/**
 * FormTitlesHelperTest class
 *
 */
class FormTitlesHelperTest extends FormHelperTest {

/**
 * setUp method
 *
 * @access public
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Form = new FormTitlesHelper($this->View);
		$this->Form->Html = new HtmlHelper($this->View);
		$this->Form->request = new CakeRequest('contacts/add', false);
		$this->Form->request->here = '/contacts/add';
		$this->Form->request['action'] = 'add';
		$this->Form->request->webroot = '';
		$this->Form->request->base = '';
	}

}

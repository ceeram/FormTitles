<?php

App::uses('FormHelper', 'View/Helper');

/**
 * FormTitles helper
 *
 */
class FormTitlesHelper extends FormHelper {

/**
 *
 * See core Form Helper
 *
 * @param string $fieldName
 * @param array $options
 * @return string Input element
 * @access public
 */
	public function input($fieldName, $options = array()) {
		$options = $this->_addTitles($fieldName, $options);
		return parent::input($fieldName, $options);
	}

	protected function _addTitles($fieldName, $options) {
		$model = $this->model();
		if ($this->_extractOption('type', $options) == 'hidden' || !isset($this->fieldset[$model]['fields'][$fieldName])) {
			return $options;
		}
		$schema = $this->fieldset[$model]['fields'][$fieldName];

		$inputTitle = $this->_extractOption('title', $schema);
		$options = $this->_addTitle($fieldName, $options , $inputTitle);
		if (!in_array('label', $this->_extractOption('format', $options, array('label' => true)))) {
			return $options;
		}

		$labelTitle = $this->_extractOption('labelTitle', $schema);
		if (!$labelTitle) {
			return $options;
		}
		$label = $this->_extractOption('label', $options , true);
		if (is_array($label)) {//label key is set as array
			$options['label'] = $this->_addTitle($fieldName, $label, $labelTitle);
		} elseif ($label === true) {//label key isnt set
				$options['label']['title'] = $labelTitle;
		} elseif (is_string($label)) {//label key is set as string
			$options['label'] = array('text' => $label, 'title' => $labelTitle);
		}
		return $options;
	}

	protected function _addTitle($fieldName, $options, $default = 'tre') {
		$title = $this->_extractOption('title', $options , true);
		if ($title === true) {//title isnt set with string
			$options['title'] = $default;
		}
		return $options;
	}

}

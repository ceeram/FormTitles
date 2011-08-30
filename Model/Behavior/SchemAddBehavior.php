<?php

/**
 * SchemAdd Behavior
 *
 */
class SchemAddBehavior extends ModelBehavior {

/**
 * Sets up the configuration for the model
 *
 * @param array $config
 * @return void
 */
	public function setup($model, $extra = array()) {
		if (!empty($model->schema)) {
			$extra = array_merge($extra, $model->schema);
		}
		if (!$extra) {
			return;
		}

		$_schema = $model->schema();
		if (!$_schema) {
			return;
		}

		foreach($_schema as $field => $meta) {
			if (array_key_exists($field, $extra) && is_array($extra[$field])) {
				foreach ($extra[$field] as $extraKey => $extraValue) {
					if (!isset($_schema[$field][$extraKey])) {
						$_schema[$field][$extraKey] = $extraValue;
					}
				}
			}
		}
	}

}
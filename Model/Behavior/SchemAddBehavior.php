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
        $this->settings[$model->name] = array('extra' => $extra);

    }

/**
 * Sets up the configuration for the model
 *
 * @param array $config
 * @return void
 */
    public function addTitles($model, $_schema = array()) {
        $extra = $this->settings[$model->name]['extra'];
        if (!$extra) {
            return $_schema;
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
        return $_schema;
    }

}
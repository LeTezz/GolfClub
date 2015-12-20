<?php
  class Color extends AppModel {

    public function getColorNames ($term = null) {
      if(!empty($term)) {
        $colors = $this->find('list', array(
          'conditions' => array(
            'name LIKE' => trim($term) . '%'
          )
        ));
        return $colors;
      }
      return false;
    }
  }
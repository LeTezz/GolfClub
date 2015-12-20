<?php
  class ColorsController extends AppController {

    public $layout = 'default';

    public $components = array('RequestHandler');

    public function index() {
      if ($this->request->is('ajax')) {
        $term = $this->request->query('term');
        $colorNames = $this->Color->getColorNames($term);
        $this->set(compact('colorNames'));
        $this->set('_serialize', 'colorNames');
      }
    }
  }
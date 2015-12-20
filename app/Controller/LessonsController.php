<?php

App::uses('AppController', 'Controller');

/**
 * Lessons Controller
 *
 * @property Lesson $Lesson
 * @property PaginatorComponent $Paginator
 */
class LessonsController extends AppController {

    public $helpers = array('Js');

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Lesson->recursive = 0;
        $this->set('lessons', $this->paginate());
        if(!$this->Session->read('Auth.User.active') && $this->Session->check('Auth.User')){
            $this->Session->setFlash(__('Vous ne pouvez pas voir l\'index complet des lecons si votre compte n\'est pas activé.'), 'flash/error');
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Lesson->exists($id)) {
            throw new NotFoundException(__('Invalid lesson'));
        }
        $options = array('conditions' => array('Lesson.' . $this->Lesson->primaryKey => $id));
        $lesson = $this->Lesson->find('first', $options);
        $this->set('lesson', $lesson);
        $this->set('category',$this->Lesson->Subcategory->Category->find('first', array('conditions' => array('id' => $lesson['Subcategory']['category_id']))));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Lesson->create();
            if ($this->Lesson->save($this->request->data)) {
                $this->Session->setFlash(__('The lesson has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The lesson could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $members = $this->Lesson->Member->find('list');
        $categories = $this->Lesson->Subcategory->Category->find('list');
        $subcategories = $this->Lesson->Subcategory->find('list', array('conditions' => array('category_id' => 1)));
        $this->set(compact('members', 'categories', 'subcategories'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Lesson->id = $id;
        if (!$this->Lesson->exists($id)) {
            throw new NotFoundException(__('Invalid lesson'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Lesson->save($this->request->data)) {
                $this->Session->setFlash(__('The lesson has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The lesson could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Lesson.' . $this->Lesson->primaryKey => $id));
            $this->request->data = $this->Lesson->find('first', $options);
        }
        $members = $this->Lesson->Member->find('list');
        $categories = $this->Lesson->Subcategory->Category->find('list');
        $this->request->data['Lesson']['category_id'] = $this->request->data['Subcategory']['category_id'];
        if (isset($this->request->data['Subcategory']['category_id'])) {
            $subcategories = $this->Lesson->Subcategory->find('list', array('conditions' => array('category_id' => $this->request->data['Subcategory']['category_id'])));
        } else {
            $subcategories = $this->Lesson->Subcategory->find('list', array('conditions' => array('category_id' => 1)));
        }
        $this->set(compact('members', 'categories', 'subcategories'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Lesson->id = $id;
        if (!$this->Lesson->exists()) {
            throw new NotFoundException(__('Invalid lesson'));
        }
        if ($this->Lesson->delete()) {
            $this->Session->setFlash(__('Lesson deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Lesson was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function beforeFilter() {
        $this->Auth->allow('index');
    }

    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin' || isset($user['role']) && $user['role'] === 'manager') {
            return true;
        }
        if($this->action == 'view'){
        if($user['active']){
            return true;
        }
    }
        // Default deny
        $this->Session->setFlash("This action is not authorized", 'flash/error');
        return false;
    }

}

<?php

App::uses('AppController', 'Controller');

/**
 * Members Controller
 *
 * @property Member $Member
 * @property PaginatorComponent $Paginator
 */
class MembersController extends AppController {

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
        $this->Member->recursive = 1;
        $this->set('members', $this->paginate());
        if(!$this->Session->read('Auth.User.active') && $this->Session->check('Auth.User')){
            $this->Session->setFlash(__('Vous ne pouvez pas voir l\'index complet des membres si votre compte n\'est pas activé.'), 'flash/error');
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
        if (!$this->Member->exists($id)) {
            throw new NotFoundException(__('Invalid member'));
        }
        $options = array('conditions' => array('Member.' . $this->Member->primaryKey => $id));
        $this->set('member', $this->Member->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Member->create();
            $data = $this->request->data['Member'];
            if (!$data['member_image']['name']) {
                unset($data['member_image']);
            }
            if ($this->Member->save($this->request->data)) {
                $this->Session->setFlash(__('The member has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The member could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $clubs = $this->Member->Club->find('list');
        $lockers = $this->Member->Locker->find('list');
        $this->set(compact('clubs', 'lockers'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Member->id = $id;
        if (!$this->Member->exists($id)) {
            throw new NotFoundException(__('Invalid member'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data['Member'];
            if (!$data['member_image']['name']) {
                unset($data['member_image']);
            }
            if ($this->Member->save($this->request->data)) {
                $this->Session->setFlash(__('The member has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The member could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Member.' . $this->Member->primaryKey => $id));
            $this->request->data = $this->Member->find('first', $options);
        }
        $clubs = $this->Member->Club->find('list');
        $lockers = $this->Member->Locker->find('list');
        $this->set(compact('clubs', 'lockers'));
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
        $this->Member->id = $id;
        if (!$this->Member->exists()) {
            throw new NotFoundException(__('Invalid member'));
        }
        if ($this->Member->delete()) {
            $this->Session->setFlash(__('Member deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Member was not deleted'), 'flash/error');
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

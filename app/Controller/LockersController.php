<?php
App::uses('AppController', 'Controller');
/**
 * Lockers Controller
 *
 * @property Locker $Locker
 * @property PaginatorComponent $Paginator
 */
class LockersController extends AppController {

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
		$this->Locker->recursive = 1;
		$this->set('lockers', $this->paginate());
		if(!$this->Session->read('Auth.User.active') && $this->Session->check('Auth.User')){
            $this->Session->setFlash(__('Vous ne pouvez pas voir l\'index complet des casiers si votre compte n\'est pas activé.'), 'flash/error');
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
		if (!$this->Locker->exists($id)) {
			throw new NotFoundException(__('Invalid locker'));
		}
		$options = array('conditions' => array('Locker.' . $this->Locker->primaryKey => $id));
		$this->set('locker', $this->Locker->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Locker->create();
			if ($this->Locker->save($this->request->data)) {
				$this->Session->setFlash(__('The locker has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The locker could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$clubs = $this->Locker->Club->find('list');
		$members = $this->Locker->Member->find('list');
		$this->set(compact('clubs', 'members'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Locker->id = $id;
		if (!$this->Locker->exists($id)) {
			throw new NotFoundException(__('Invalid locker'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Locker->save($this->request->data)) {
				$this->Session->setFlash(__('The locker has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The locker could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Locker.' . $this->Locker->primaryKey => $id));
			$this->request->data = $this->Locker->find('first', $options);
		}
		$clubs = $this->Locker->Club->find('list');
		$members = $this->Locker->Member->find('list');
		$this->set(compact('clubs', 'members'));
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
		$this->Locker->id = $id;
		if (!$this->Locker->exists()) {
			throw new NotFoundException(__('Invalid locker'));
		}
		if ($this->Locker->delete()) {
			$this->Session->setFlash(__('Locker deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Locker was not deleted'), 'flash/error');
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
        $this->Session->setFlash("This action is not authorized",'flash/error');
        return false;
        
        
    }
}

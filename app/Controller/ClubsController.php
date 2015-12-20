<?php
App::uses('AppController', 'Controller');
/**
 * Clubs Controller
 *
 * @property Club $Club
 * @property PaginatorComponent $Paginator
 */
class ClubsController extends AppController {

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
		$this->Club->recursive = 0;
		$this->set('clubs', $this->paginate());
		if(!$this->Session->read('Auth.User.active') && $this->Session->check('Auth.User')){
            $this->Session->setFlash(__('Vous ne pouvez pas voir l\'index complet des clubs si votre compte n\'est pas activé.'), 'flash/error');
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
		if (!$this->Club->exists($id)) {
			throw new NotFoundException(__('Invalid club'));
		}
		$options = array('conditions' => array('Club.' . $this->Club->primaryKey => $id));
		$this->set('club', $this->Club->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Club->create();
                        $this->request->data['Club']['user_id'] = $this->Auth->user('id');
			if ($this->Club->save($this->request->data)) {
				$this->Session->setFlash(__('The club has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The club could not be saved. Please, try again.'), 'flash/error');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Club->id = $id;
		if (!$this->Club->exists($id)) {
			throw new NotFoundException(__('Invalid club'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Club->save($this->request->data)) {
				$this->Session->setFlash(__('The club has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The club could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Club.' . $this->Club->primaryKey => $id));
			$this->request->data = $this->Club->find('first', $options);
		}
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
		$this->Club->id = $id;
		if (!$this->Club->exists()) {
			throw new NotFoundException(__('Invalid club'));
		}
		if ($this->Club->delete()) {
			$this->Session->setFlash(__('Club deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Club was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
        public function beforeFilter() {
        $this->Auth->allow('index');
    }
    
    public function isAuthorized($user) {
    // All registered users can add posts
    if ($this->action === 'add') {
        if (isset($user['role']) && $user['role'] === 'admin' || isset($user['role']) && $user['role'] === 'manager') {
            return true;
        }
    }

    // The owner of a post can edit and delete it
    if (in_array($this->action, array('edit', 'delete'))) {
        
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        
        $postId = (int) $this->request->params['pass'][0];
        if ($this->Club->isOwnedBy($postId, $user['id'])) {
            return true;
        }
    }
    if($this->action == 'view'){
        if($user['active']){
            return true;
        }
    }
    
    $this->Session->setFlash("This action is not authorized", 'flash/error');
        return false;

    return parent::isAuthorized($user);
}
}

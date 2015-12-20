<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('logout', 'register', 'login', 'activate');
    }

    public function login() {
        if ($this->request->is('post')) {
            
                if ($this->Auth->login()) {
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(__('Invalid username or password, try again'));
            }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Flash', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            $this->User->saveField('active', 1);


            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
            }
        }
    }

    public function send_mail($recipient = null, $username = null, $id = null, $redirect = true) {
        $link = array('controller' => 'users', 'action' => 'activate', $id);
        App::uses('CakeEmail', 'Network/Email');
        $mail = new CakeEmail('gmail');
        $mail->from('noreply@localhost.com')->to($recipient)->subject('Mail Confirm');
        $mail->emailFormat('html')->template('activate')->viewVars(array('username' => $username, 'link' => $link));
        $mail->send();
        if ($redirect) {
            $this->redirect('/');
        }
    }

    public function activate($link) {
        $linkA = explode('-', $link);
        $user = $this->User->find('first', array('conditions' => array('id' => $linkA[0], 'active' => 0)));
        if (!empty($user)) {
            $this->User->id = $user['User']['id'];
            $this->User->saveField('active', 1);
            $this->Session->setFlash('Account Active');
            $this->redirect($this->Auth->logout());
        } else {
            $this->Session->setFlash('User already activated or non-existing');
            $this->redirect('/');
        }
    }

    public function register() {
        if ($this->request->is('post')) {
            $this->request->data['User']['role'] = 'visiteur';
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $datad = $this->request->data;
                $this->send_mail($datad['User']['email'], $datad['User']['username'], $this->User->getInsertID(), false);
                $this->Session->setFlash(__('The user has been saved'), 'flash/success');
                $this->redirect(array(
                    'controller' => 'members',
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
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
        $this->User->id = $id;
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user) {
        // All registered users can add posts
        // The owner of a post can edit and delete it
        if (in_array($this->action, array('view'))) {
            $id = (int) $this->request->params['pass'][0];
            if ($this->Session->read('Auth.User.id') == $id) {
                return true;
            }
        }
        if ($this->Session->read('Auth.User.role') == 'manager') {
            $this->Session->setFlash("This action is not authorized", 'flash/error');
            return false;
        }

        if ($this->action == 'send_mail' && isset($user['id']) && $this->request->params['pass'][2] === $user['id']) {
            return true;
        }



        return parent::isAuthorized($user);
    }

}

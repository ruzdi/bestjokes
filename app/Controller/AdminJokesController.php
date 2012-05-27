<?php
/**
 * *****************************************************************************
 * File: AdminJokesController.php
 * Description: This controller is for crud operation of jokes
 * Create Date: May 27, 2012
 * @author Md. Ruzdi Islam  
 * @copyright Copyright © 2012 Artomus , All rights reserved
 * ***************************************************************************
 */
App::uses('AppController', 'Controller');

/**
 * Jokes Controller
 *
 * @property Joke $Joke
 */
class AdminJokesController extends AppController {
    
    public $helpers = array('Html', 'Form');
    public $name = 'AdminJokes';
    public $uses = array('Joke', 'User', 'Role');
    
    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'Joke.create_date' => 'desc'
        )
    );

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Joke->recursive = 0;
        $this->set('jokes', $this->paginate());
        $roles = $this->User->Role->find('list', array('fields' => array('Role.id', 'Role.title')));
        $this->set(compact('roles'));
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Joke->id = $id;
        if (!$this->Joke->exists()) {
            throw new NotFoundException(__('Invalid joke'));
        }
        $this->set('joke', $this->Joke->read(null, $id));
        $roles = $this->User->Role->find('list', array('fields' => array('Role.id', 'Role.title')));
        $this->set(compact('roles'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        
        if ($this->request->is('post')) {
            $datetime = date( 'Y-m-d H:i:s');            
            $this->Joke->create();
            $this->request->data['Joke']['user_id'] = $this->useridentity->id;
            $this->request->data['Joke']['create_date'] = $datetime;
            $this->request->data['Joke']['update_date'] = $datetime;
            if ($this->Joke->save($this->request->data)) {
                $this->Session->setFlash(__('The joke has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The joke could not be saved. Please, try again.'));
            }
        }
        $users = $this->Joke->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Joke->id = $id;
        if (!$this->Joke->exists()) {
            throw new NotFoundException(__('Invalid joke'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $datetime = date( 'Y-m-d H:i:s');
            $this->request->data['Joke']['update_date'] = $datetime;
            if ($this->Joke->save($this->request->data)) {
                $this->Session->setFlash(__('The joke has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The joke could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Joke->read(null, $id);
        }
        $users = $this->Joke->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Joke->id = $id;
        if (!$this->Joke->exists()) {
            throw new NotFoundException(__('Invalid joke'));
        }
        if ($this->Joke->delete()) {
            $this->Session->setFlash(__('Joke deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Joke was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}

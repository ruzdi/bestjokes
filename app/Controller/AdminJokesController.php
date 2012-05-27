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
    //setting the parameter for pagination
    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'Joke.create_date' => 'desc'
        )
    );

    /**
     * index method display list of all jokes
     * 
     * @param null
     * @return void
     */
    public function index() {
        try {
            $this->Joke->recursive = 0;
            $this->set('jokes', $this->paginate());
        } catch (Exception $e) {
            $this->Session->setFlash(__('Error occured. Error Message: '.$e->getMessage()), 'flash/error_flash', null, 'error');
        }
    }

    /**
     * view method displaying only one joke at a time
     *
     * @param ineger $id
     * @return void
     */
    public function view($id = null) {
        try {
            $this->Joke->id = (int)$id;
            if (!$this->Joke->exists()) {
                throw new NotFoundException(__('Invalid joke'));
            }
            $this->set('joke', $this->Joke->read(null, $id));
        } catch (Exception $e) {
            $this->Session->setFlash(__('Error occured. Error Message: '.$e->getMessage()), 'flash/error_flash', null, 'error');
        }
    }

    /**
     * add method is used for adding a joke
     * 
     * @return void
     */
    public function add() {
        try {
            if ($this->request->is('post')) {
                $datetime = date('Y-m-d H:i:s');
                $this->Joke->create();
                $this->request->data['Joke']['user_id'] = $this->useridentity->id;
                $this->request->data['Joke']['create_date'] = $datetime;
                $this->request->data['Joke']['update_date'] = $datetime;
                if ($this->Joke->save($this->request->data)) {
                    $this->Session->setFlash(__('The joke has been saved'), 'flash/success_flash', null, 'success');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The joke could not be saved. Please, try again.'), 'flash/error_flash', null, 'error');
                }
            }
        } catch (Exception $e) {
            $this->Session->setFlash(__('Error occured. Error Message: '.$e->getMessage()), 'flash/error_flash', null, 'error');
        }
    }

    /**
     * edit method is used for editing a joke
     *
     * @param integer $id
     * @return void
     */
    public function edit($id = null) {
        try {
            $this->Joke->id = (int)$id;
            if (!$this->Joke->exists()) {
                throw new NotFoundException(__('Invalid joke'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                $datetime = date('Y-m-d H:i:s');
                $this->request->data['Joke']['update_date'] = $datetime;
                if ($this->Joke->save($this->request->data)) {
                    $this->Session->setFlash(__('The joke has been saved'), 'flash/success_flash', null, 'success');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The joke could not be saved. Please, try again.'), 'flash/error_flash', null, 'error');
                }
            } else {
                $this->request->data = $this->Joke->read(null, $id);
            }
        } catch (Exception $e) {
            $this->Session->setFlash(__('Error occured. Error Message: '.$e->getMessage()), 'flash/error_flash', null, 'error');
        }
    }

    /**
     * delete method is used for deleting a joke
     *
     * @param integer $id
     * @return void
     */
    public function delete($id = null) {
        try {
            if (!$this->request->is('post')) {
                throw new MethodNotAllowedException();
            }
            $this->Joke->id = (int)$id;
            if (!$this->Joke->exists()) {
                throw new NotFoundException(__('Invalid joke'));
            }
            if ($this->Joke->delete()) {
                $this->Session->setFlash(__('Joke deleted'), 'flash/success_flash', null, 'success');
                $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Joke was not deleted'), 'flash/error_flash', null, 'error');
            $this->redirect(array('action' => 'index'));
        } catch (Exception $e) {
            $this->Session->setFlash(__('Error occured. Error Message: '.$e->getMessage()), 'flash/error_flash', null, 'error');
        }
    }

}

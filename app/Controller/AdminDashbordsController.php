<?php

/**
 * *****************************************************************************
 * File: AdminDashbordsController.php
 * Description: This controller is for dashbord preview 
 * Create Date: May 27, 2012
 * @author Md. Ruzdi Islam  
 * @copyright Copyright © 2012 Artomus , All rights reserved
 * ***************************************************************************
 */
App::uses('AppController', 'Controller');
//App::uses('CakeEmail', 'Network/Email');

/**
 * Dashbord Controller
 *
 * @property Dashbord $Dashbord
 */
class AdminDashbordsController extends AppController {

    public $helpers = array('Html', 'Form');
    public $name = 'AdminDashbords';
    public $uses = array('User', 'Role');

    public function beforeFilter() {
        parent::beforeFilter();

        if ($this->params['controller'] != 'admin_dashbords' && $this->params['controller'] != 'login') {
            $useridentity = CakeSession::read('User.identity');
            if (empty($useridentity['User'])) {
                $this->redirect('/admin/');
            }
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        
    }

    /**
     * index method
     *
     * @return void
     */
    public function login() {

        try {
            $this->User->recursive = 0;

            if (!empty($this->request->data)) {

                $user = trim($this->request->data['User']['user']);
                $password = trim($this->request->data['User']['password']);

                $userRow = $this->User->checkUserLoginInformation($user, $password);

                if (!empty($userRow) && $userRow != -1 && count($userRow) > 0) {
                    CakeSession::write('User.identity', $userRow);
                    $this->Session->setFlash(__('Successfully login.'), 'flash/welcome_flash', null, 'welcome');
                    $this->redirect('/admin/jokes');
                } else {
                    $this->Session->setFlash(__('Wrong login information provided.'), 'flash/error_flash', null, 'error');
                }
            }
        } catch (Exception $e) {            
            $this->Session->setFlash(__('Error occured. Error Message: '.$e->getMessage()), 'flash/error_flash', null, 'error');
        }
    }

    public function logout() {
        try {
            CakeSession::delete('User.identity');
            $this->redirect('/admin/login');
        } catch (Exception $e) {
            $this->Session->setFlash(__('Error occured. Error Message: '.$e->getMessage()), 'flash/error_flash', null, 'error');
        }
    }

}

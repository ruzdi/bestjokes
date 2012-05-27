<?php

/**
 * *****************************************************************************
 * File: AdminContentsController.php
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
                $this->redirect('/admin_dashbords/login');
            }
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        //$useridentity = CakeSession::read('User.identity');
        //echo "Read"; print_r($useridentity);
    }

    /**
     * index method
     *
     * @return void
     */
    public function login() {

        $this->User->recursive = 0;

        if (!empty($this->request->data)) {
            
            $user = trim($this->request->data['User']['user']);
            $pass = trim($this->request->data['User']['password']);
            
            $sql = "SELECT `User`.`id`, `User`.`user`, `User`.`email`, `User`.`role_id`, `User`.`is_active`, `Role`.`id`, `Role`.`role`, `Role`.`title`, `Role`.`detail` FROM `bestjokes`.`users` AS `User` LEFT JOIN `bestjokes`.`roles` AS `Role` ON (`User`.`role_id` = `Role`.`id`) WHERE `User`.`user` = 'admin' AND `User`.`password` = SHA1(CONCAT('{$pass}',salt)) AND `User`.`is_active` = '1' LIMIT 1";
            $userRow = $this->User->query($sql);
            
            //$userRow = $this->User->find('first', array('conditions' => array('User.user' => $user, 'User.password' => sprintf("SHA1(CONCAT('%s',salt))",$pass), 'User.is_active' => 1)));
              
            if (!empty($userRow[0]) && count($userRow[0]) > 0) {
                CakeSession::write('User.identity', $userRow[0]);
                $this->Session->setFlash(__d('dashbord', 'msgSuccessfulLogin'), 'flash/welcome_flash', null, 'welcome');
                $this->redirect('/admin/jokes');
                //$this->redirect(array('controller' => 'admin_jokes', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__d('dashbord', 'msgWrongLoginInformation'), 'flash/error_flash', null, 'error');
            }
        }
    }

    public function logout() {
        CakeSession::delete('User.identity');
        $this->redirect('/admin/login');
    }

}

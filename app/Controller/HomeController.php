<?php
/**
 * *****************************************************************************
 * File: HomeController.php
 * Description: This controller is for displaying jokes data to public user
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
class HomeController extends AppController {
    
    public $helpers = array('Html', 'Form');
    public $name = 'Home';
    public $uses = array('Joke', 'User', 'Role');
    
    public $paginate = array(
        'limit' => 3,
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


}

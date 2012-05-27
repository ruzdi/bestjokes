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
    //setting the parameter for pagination
    public $paginate = array(
        'limit' => 6,
        'order' => array(
            'Joke.create_date' => 'desc'
        )
    );

    /**
     * index method displaying the home page
     * 
     * @param null
     * @return void
     */
    public function index() {
        try {
            $this->Joke->recursive = 0;
            $this->set('jokes', $this->paginate());
        } catch (Exception $e) {
            
        }
    }

}

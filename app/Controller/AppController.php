<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    private $_controllers = array();
    private $_adminControllers = array();   
    public $uses = array();
    
    public $components = array('Session');
    
    public $language_id = null;
    
    public $useridentity = null;

    function beforeFilter() {

        $this->validateLoginStatus();

        if(substr($this->params['controller'],0,6) == 'admin_' ){
        	$this->layout = "admin/layout";	
        }else{
        	$this->layout = "public/layout";
        }
        
        $lang = Configure::read('default_language');
        
        if(!$this->Session->check("language")){
            //$this->Session->del("language");
            $this->Session->write("language", $lang);
        }
        
        $this->language_id = 1;
        $this->Session->write("langId", 1);
        
        Configure::write('Config.language', $lang);
        
        if ((substr($this->params['controller'], 0, 6) != 'admin_') && !empty($this->request->data)) {
            array_walk_recursive($this->request->data, array($this, 'whitespace'));
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => FALSE));
        }
        
    }

    function beforeRender() {
        
        $this->set('defaultContentLayout', true);
        
        $project_url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "")."://" . $_SERVER['SERVER_NAME'].$this->webroot;
        $current_method_url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "")."://" . $_SERVER['SERVER_NAME'].$this->webroot.$this->params['controller'].DIRECTORY_SEPARATOR.$this->params['action'] . DIRECTORY_SEPARATOR;
        $current_url = "http" . ((!empty($_SERVER['HTTPS'])) ? "s" : "")."://" . $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        
        $this->set('project_url', $project_url);
        $this->set('current_method_url', $current_method_url);
        $this->set('current_url', $current_url);
        
        
        /**
         *  sample code of flash message
         */
        //$this->Session->setFlash('Something bad.', 'default', array('class' => 'alert_warning'), 'warning');        
        //$this->Session->setFlash('Something like warning.', 'flash/warning_flash', null, 'warning');
        //$this->Session->setFlash('Something like error.', 'flash/error_flash', null, 'error');
        //$this->Session->setFlash('Something like success.', 'flash/success_flash', null, 'success');
        //$this->Session->setFlash('Something like welcome.', 'flash/welcome_flash', null, 'welcome');  
        
        /**
         *  sample code of setting default header
         */
        //$this->set('defaultContentHeader', __d('default','lblDefaultContentHeader'));
        
        
    }

    private function validateLoginStatus() {

        $useridentity = CakeSession::read('User.identity');
        if($this->params['controller'] != 'admin_dashbords' && !in_array($this->params['action'], array('login') )){         
            if (empty($useridentity['User'])) {                
                if(substr($this->params['controller'], 0, 6) == 'admin_'){            
                    $this->redirect('/admin_dashbords/login');
                }else{
                    //$this->redirect('/');
                }
            }
        }
        
        $hasIdentity = !empty($useridentity['User'])?true:false;
        $this->set('hasIdentity', $hasIdentity);        
        $username = NULL;
        if(!$hasIdentity && ($this->params['controller'] != 'admin_dashbords' && $this->params['action'] != 'login') ){            
            if(substr($this->params['controller'], 0, 6) == 'admin_'){            
                $this->redirect('/admin_dashbords/login');
            }else{
                //$this->redirect('/');
            }
        }else{
            $username = ucfirst($useridentity['User']['user']);
            $this->set('username', $username);
        }
        
        if(!empty($useridentity)){
            $this->useridentity->id = $useridentity['User']['id'];
            $this->useridentity->user = $useridentity['User']['user'];
            $this->useridentity->email = $useridentity['User']['email'];
            $this->useridentity->role_id = $useridentity['User']['role_id'];
        }
        
    }

    function whitespace(&$value, &$key) {
        $key = trim($key);
        $value = trim($value);
        $value = Sanitize::html($value, array('remove' => TRUE));
    }
    
}

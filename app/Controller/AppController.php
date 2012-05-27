<?php
/**
 * *****************************************************************************
 * File: AppController.php
 * Description: This controller is for global management
 * Create Date: May 27, 2012
 * @author Md. Ruzdi Islam  
 * @copyright Copyright © 2012 Artomus , All rights reserved
 * ***************************************************************************
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
    
    /**
     * Setting up the layout
     *  @param null
     *  @return null
     */

    function beforeFilter() {

        $this->validateLoginStatus();

        if(substr($this->params['controller'],0,6) == 'admin_' ){
        	$this->layout = "admin/layout";	
        }else{
        	$this->layout = "public/layout";
        }
        
        /*$lang = Configure::read('default_language');
        
        if(!$this->Session->check("language")){
            $this->Session->write("language", $lang);
        }
        
        $this->language_id = 1;
        $this->Session->write("langId", 1);
        
        Configure::write('Config.language', $lang);*/
        
        if ((substr($this->params['controller'], 0, 6) != 'admin_') && !empty($this->request->data)) {
            array_walk_recursive($this->request->data, array($this, 'whitespace'));
            $this->request->data = Sanitize::clean($this->request->data, array('encode' => FALSE));
        }
        
    }

    /**
     * Setting up project and other url
     * 
     *  @param null
     *  @return null
     */
    function beforeRender() {
               
        /**
         *  sample code of flash message
         */
        //$this->Session->setFlash('Something bad.', 'default', array('class' => 'alert_warning'), 'warning');        
        //$this->Session->setFlash('Something like warning.', 'flash/warning_flash', null, 'warning');
        //$this->Session->setFlash('Something like error.', 'flash/error_flash', null, 'error');
        //$this->Session->setFlash('Something like success.', 'flash/success_flash', null, 'success');
        //$this->Session->setFlash('Something like welcome.', 'flash/welcome_flash', null, 'welcome');  
        
        
    }

    /**
     * Check user is login or not and also setup user and other necessary veriable
     * 
     *  @param null
     *  @return null
     */
    private function validateLoginStatus() {

        $useridentity = CakeSession::read('User.identity');
        if($this->params['controller'] != 'admin_dashbords' && !in_array($this->params['action'], array('login') )){         
            if (empty($useridentity['User'])) {                
                if(substr($this->params['controller'], 0, 6) == 'admin_'){            
                    $this->redirect('/admin/');
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
                $this->redirect('/admin/');
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

    /**
     * is used for cleaning the whitespace and html tags
     * 
     *  @param $value value of the each array item
     *  @param $key value of the  each array item
     *  @return null
     */
    function whitespace(&$value, &$key) {
        $key = trim($key);
        $value = trim($value);
        $value = Sanitize::html($value, array('remove' => TRUE));
    }
    
}

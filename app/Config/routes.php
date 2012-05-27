<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */

//front end routing
Router::connect('/', array('controller' => 'home', 'action' => 'index', 'home'));

//backend end routing every back end routing must begin with the url like 'PROJECT_URL/admin/'
Router::connect('/admin', array('controller' => 'admin_dashbords', 'action' => 'login', 'loginpanel'));
Router::connect('/admin/dashbord', array('controller' => 'admin_dashbords', 'action' => 'index', 'dashbord'));
Router::connect('/admin/login', array('controller' => 'admin_dashbords', 'action' => 'login', 'login'));
Router::connect('/admin/logout', array('controller' => 'admin_dashbords', 'action' => 'logout', 'logout'));
Router::connect('/admin/jokes', array('controller' => 'admin_jokes', 'action' => 'index', 'jokes'));
Router::connect('/admin/jokes-add', array('controller' => 'admin_jokes', 'action' => 'add', 'jokes-add'));
Router::connect('/admin/jokes-edit', array('controller' => 'admin_jokes', 'action' => 'edit', 'jokes-edit'));
Router::connect('/admin/jokes-view', array('controller' => 'admin_jokes', 'action' => 'view', 'jokes-view'));
Router::connect('/admin/jokes-delete', array('controller' => 'admin_jokes', 'action' => 'delete', 'jokes-delete'));

/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';

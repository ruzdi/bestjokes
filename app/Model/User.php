<?php
/**
 * *****************************************************************************
 * File: User.php
 * Description: This model is for maintaining relation with user table
 * Create Date: May 27, 2012
 * @author Md. Ruzdi Islam  
 * @copyright Copyright © 2012 Artomus , All rights reserved
 * ***************************************************************************
 */
App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property Role $Role
 * @property Joke $Joke
 */
class User extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'id';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'user' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'password' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'role_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'is_active' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'role_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Joke' => array(
            'className' => 'Joke',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
    
    /**
     * This function will check user login information
     * 
     * @param string $user
     * @param string $password
     * @return 
     *      if success return user data array
     *      if fail return false
     */
    public function checkUserLoginInformation($user, $password) {
        try {
            $sql = "SELECT `User`.`id`, `User`.`user`, `User`.`email`, `User`.`role_id`, `User`.`is_active`, `Role`.`id`, `Role`.`role`, `Role`.`title`, `Role`.`detail` FROM `users` AS `User` LEFT JOIN `roles` AS `Role` ON (`User`.`role_id` = `Role`.`id`) WHERE `User`.`user` = '{$user}' AND `User`.`password` = SHA1(CONCAT('{$password}',salt)) AND `User`.`is_active` = '1' LIMIT 1";
            $userRow = $this->query($sql);
            
            if (count($userRow) > 0) {
                return $userRow[0];
            }
            return -1;
        } catch (Exception $e) {
            return -1;
        }
    }

}

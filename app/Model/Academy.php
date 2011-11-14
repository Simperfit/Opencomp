<?php

/**
  * Academy.php
  *
  * PHP version 5
  *
  * @category Model
  * @package  Opencomp
  * @author   Jean Traullé <jtraulle@gmail.com>
  * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
  * @link     http://www.opencomp.fr
  */

/**
 * Modèle de gestion des académies.
 *
 * @category Model
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class Academy extends AppModel
{

    var $hasAndBelongsToMany = array(
        'User' =>
            array(
                'className'              => 'User',
                'joinTable'              => 'academies_users',
                'foreignKey'             => 'academy_id',
                'associationForeignKey'  => 'user_id',
                'unique'                 => true
            )
    );

    var $validate = array(
        'name' => array(
            'longueur' => array(
                'rule' => array('minLength', 3),
                'message' => 'Taille minimum de 3 caractères'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'Cette académie existe déjà, veuillez saisir un autre nom.'
            )
        ),
        'type' => array(
            'requis' => array(
                'rule' => array('inList', array('0', '1')),
                'message' => 'Vous devez sélectionner un type d\'académie.'
            )
        )
    );
}

?>

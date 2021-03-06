<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Classroom $Classroom
 * @property Establishment $Establishment
 * @property Evaluation $Evaluation
 * @property Item $Item
 * @property Academy $Academy
 * @property Classroom $Classroom
 * @property Competence $Competence
 * @property Establishment $Establishment
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = array("%s %s", "{n}.User.first_name", "{n}.User.name");

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
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
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
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
		'role' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Classroom' => array(
			'className' => 'Classroom',
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
		),
		'Establishment' => array(
			'className' => 'Establishment',
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
		),
		'Evaluation' => array(
			'className' => 'Evaluation',
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
		),
		'Item' => array(
			'className' => 'Item',
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
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Academy' => array(
			'className' => 'Academy',
			'joinTable' => 'academies_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'academy_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Classroom' => array(
			'className' => 'Classroom',
			'joinTable' => 'classrooms_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'classroom_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Competence' => array(
			'className' => 'Competence',
			'joinTable' => 'competences_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'competence_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Establishment' => array(
			'className' => 'Establishment',
			'joinTable' => 'establishments_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'establishment_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
	
	public function findAllUsersInClassroom($classroom_id){
		$titulaire = $this->Classroom->find('first', array(
			'fields' => 'user_id',
			'recursive' => 0,
        	'conditions' => array('Classroom.id' => $classroom_id)
        ));
        $intervenants = $this->ClassroomsUser->find('all', array(
			'fields' => 'user_id',
			'recursive' => 0,
        	'conditions' => array('classroom_id' => $classroom_id)
        ));
        
        $result[] = $titulaire['Classroom']['user_id'];
        
        foreach($intervenants as $info){
	        $result[] = $info['ClassroomsUser']['user_id'];
        }
        
        return($result);
	}
	
	public function findAuthorizedClasses($user_id){
		$result['classrooms'] = array();

        $titulaire = $this->Classroom->find('all', array(
			'fields' => 'id',
			'recursive' => 0,
			'conditions' => array('Classroom.user_id' => $user_id)
		));
		
		foreach($titulaire as $info){
		    $result['classrooms'][] = $info['Classroom']['id'];
            $result['classrooms_manager'][] = $info['Classroom']['id'];
		}
		
		$intervenants = $this->ClassroomsUser->find('all', array(
			'fields' => 'classroom_id',
			'recursive' => 0,
			'conditions' => array('user_id' => $user_id)
		));
		
		foreach($intervenants as $info){
		    $result['classrooms'][] = $info['ClassroomsUser']['classroom_id'];
		}

		return $result;
	}

}

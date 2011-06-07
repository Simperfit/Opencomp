<?php

class User extends AppModel{
	
	

	var $validate = array(
		'username' => array(
			'longueur' => array(
				'rule' => array('minLength', 5),
				'message' => 'Taille minimum de 5 caractères'
			),
			'unique_create' => array(
                            'rule' => 'isUnique',
                            'on' => 'create',
                            'message' => 'Le nom d\'utilisateur saisi n\'est pas disponible, veuillez en choisir un autre !'
                        ),
                        'unique_update' => array(
                            'rule' => 'isUniqueUpdate',
                            'on' => 'update',
                            'message' => 'Le nom d\'utilisateur saisi n\'est pas disponible, veuillez en choisir un autre !'
                        )
		),               
            
                'passwrd' => array(
                        'rule' => array('minLength', 6),
                        'required' => true,
                        'allowEmpty' => true,
                        'on'=>'update',
                        'message' => 'Taille minimum de 6 caractères !'
                ),
                'passwrd' => array(
                        'rule' => array('minLength', 6),
                        'required' => true,
                        'allowEmpty' => false,
                        'on'=>'create',
                        'message' => 'Taille minimum de 6 caractères !'
                ),
                'passwrd2' => array(
                        'rule' => 'checkPasswords',
                        
                        'message' => 'Les mots de passe ne correspondent pas !'
                ),
            
                'first_name' => array(
                        'rule' => array('minLength', 2),
                        'required' => true,
                        'allowEmpty' => false,
                        'message' => 'Vous devez compléter ce champs !'
                ),
            
                'name' => array(
                        'rule' => array('minLength', 2),
                        'required' => true,
                        'allowEmpty' => false,
                        'message' => 'Vous devez compléter ce champs !'
                ),
                
                //La validation de l'hôte de l'adresse email ralenti énormément, 
                //le traitement. L'option est desactivé desormais.                
                'email' => array(
                        'rule' => array('email', false),
                        'message' => 'Merci de soumettre une adresse email valide.'
                )
);

        //Cette fonction vérifie que les deux mots de passes saisis sont identiques        
        function checkPasswords($data)
        {
            if ($this->data[$this->name]['passwrd'] == $this->data[$this->name]['passwrd2'])
                return true;
            else
                return false;
        }

        //Cette fonction permet de vérifier que l'utilisateur ne saisi pas un
        //nom d'utilisateur déjà existant mais exclut de la vérification 
        //le nom d'utilisateur actuel de l'utilisateur.
        function isUniqueUpdate($data)
        {
            return !$this->find(
                'count',
                array(
                    'conditions' => array(
                        $data,
                        "id != {$this->data[$this->alias]['id']}" 
                    ),
                    'recursive' => -1
                )
            );
        }

        function beforeSave()
        {        
            //Si on envoie un mot de passe hâché, inutile de le hâcher à nouveau
            if(isset($this->data[$this->alias]['passhache']))
            {
                //On indique juste que le champs passhache correspond en réalité
                //au champs password dans la base de données.
                $this->data[$this->alias]['password'] = $this->data[$this->alias]['passhache'];                
            }
            else
            {
                // On indique que passwrd correspond en fait à password.
                $this->data[$this->alias]['password'] = $this->data[$this->alias]['passwrd'];

                // Si le champ password n'est pas vide, c'est qu'il a été modifié. 
                // Alors, on l'encrypte.
                if(!empty($this->data[$this->alias]['password']))
                {
                    $this->data[$this->alias]['password'] = Security::hash($this->data[$this->alias]['password'], null, true);
                }

                // Si on a récupéré un champ Id du formulaire, c'est que la personne
                // est en train d'éditer un enregistrement.
                if (isset($this->data[$this->alias]['id']))
                {
                    // Si le champ password n'a pas été complété, on fait en sorte 
                    // de récupérer le hash à partir de la BDD.
                    if (empty($this->data[$this->alias]['password']))
                    {
                        $user = $this->findById($this->data[$this->alias]['id']);
                        $passcrypte = $user[$this->alias]['password'];

                        $this->data[$this->alias]['password'] = $passcrypte;
                    }
                }
            }
            
        return true;
        }
}

?>

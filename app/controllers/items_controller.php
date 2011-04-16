<?php

/**
 * Contrôleur de gestion des items
 *
 * @category	Controller
 * @package 	Opencomp
 * @version 	1.0
 * @author		Jean Traullé <jtraulle@gmail.com>
 * @license  	http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     	http://www.opencomp.fr
 */
class ItemsController extends AppController
{
    /**
    * Cette fonction permet d'ajouter et d'éditer un item se rattachant à une compétence
    */
    function edit($id = null)
    {
        $this->set('title_for_layout', __('Ajouter/Modifier une compétence',true));

        // Passage de la liste des compétences à la Vue :
        $this->set('competences', $this->Item->Competence->generatetreelist(null, null, null, '......'));

        //Si le formulaire a déjà été envoyé
        if(isset($this->data))
        {
            //On récupère grâce à find la position du dernier item pour la compétence en cours
            $derniereplace = $this->Item->find('first', array(
                'conditions' => array('Item.competence_id' => $this->data['Item']['competence_id']),
                'recursive' => -1,
                'fields' => array('Item.place'),
                'order' => array('Item.place DESC')
                ));

            //On ajoute un pour incrémenter la place de 1
            $this->data['Item']['place'] = $derniereplace['Item']['place'] +1;

            //Sauvegarde des données en base
            if ($this->Item->save($this->data))
            {
                //Message de confirmation et redirection
                $this->Session->setFlash(__('Cet Item a été correctement ajouté',true), 'message_succes');
                $this->redirect(array('action' => 'edit'));
            }
            else
            {
                $this->Session->setFlash(__('Veuillez corriger les erreurs mentionnées.',true), 'message_attention');
            }
        }
        else
        {
            //On tente de précharger le formulaire avec les informations
            //concernant l'item dont l'id est passé en paramètre
            $this->data = $this->Item->read(null, $id);
        }
    }
}

?>
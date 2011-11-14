
<?php

/**
  * CompetencesController.php
  * 
  * PHP version 5
  *
  * @category Controller
  * @package  Opencomp
  * @author   Jean Traullé <jtraulle@gmail.com>
  * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
  * @link     http://www.opencomp.fr
  */

/**
 * Contrôleur de gestion des compétences.
 *
 * @category Controller
 * @package  Opencomp
 * @author   Jean Traullé <jtraulle@gmail.com>
 * @license  http://www.opensource.org/licenses/agpl-v3 The Affero GNU General Public License
 * @link     http://www.opencomp.fr
 */
class CompetencesController extends AppController
{
    // Appel du Helper Tree
    public $helpers = array('Tree');

    /**
     * Méthode listant l'ensemble des compétences.
     *
     * @return void
     * @access public
     */
    public function index()
    {
        $this->set('title_for_layout', __('Référentiel de compétences', true));

        $this->Competence->recursive = -1;
        $categories = $this->Competence->children(false);

        $this->set(compact('categories'));

        $sql1 = $this->Competence->Item->find('list', array(
            'fields' => array('title', 'type', 'competence_id'),
            'order' => array('Item.competence_id','Item.place')
            ));
        $this->set('itemsType', $sql1);

        $sql2 = $this->Competence->Item->find('list', array(
            'fields' => array('title', 'id', 'competence_id'),
            'order' => array('Item.competence_id','Item.place')
            ));
        $this->set('itemsPlace', $sql2);
    }

    /**
     * Méthode permettant d'ajouter/éditer une catégorie.
     *
     * @param int $id Id de la catégorie à éditer
     * 
     * @return void
     * @access public
     */
    public function edit($id = null)
    {
        $title = __('Ajouter', true);

        if (!empty($this->request->data['Category']['id'])) {
            $title = __('Modifier', true);
        }

        $title .= ' '.__('une catégorie au référentiel de compétences', true);

        $this->set('title_for_layout', $title);

        if (isset($this->request->data)) {
            $this->Competence->set($this->request->data);

            if (!$this->Competence->validates()) {
                $this->Session->setFlash(__('Corrigez les erreurs mentionnées', true), 'message_attention');
                return;
            }

            $this->Competence->save(null, false);

            $this->Session->setFlash(__('Données enregistrées.', true), 'message_succes');
            $this->redirect('edit');
        }

        $this->request->data = $this->Competence->read(null, $id);
        $this->set('parents', $this->Competence->generatetreelist());
    }

    /**
     * Cette méthode monte une catégorie d'un cran.
     *
     * @param int $id Id de la catégorie à déplacer
     * 
     * @return void
     * @access public
     */
    public function moveUp($id = null)
    {
        if (!$this->Competence->moveup($id)) {
            $this->Session->setFlash(__('La catégorie ne peut pas aller plus haut.', true), 'message_erreur');
        } else {
            $this->Session->setFlash(__('Ordre mis à jour.', true), 'message_succes');
        }

        $this->redirect($this->referer());
    }

    /**
     * Cette méthode descend une catégorie d'un cran.
     *
     * @param int $id Id de la catégorie à déplacer
     * 
     * @return void
     * @access public
     */
    public function moveDown($id = null)
    {
        if (!$this->Competence->movedown($id)) {
            $this->Session->setFlash(__('La catégorie ne peut pas aller plus bas.', true), 'message_erreur');
        } else {
            $this->Session->setFlash(__('Ordre mis à jour.', true), 'message_succes');
        }

        $this->redirect($this->referer());
    }

    /**
     * Cette méthode supprime une catégorie.
     *
     * @param int $id Id de la catégorie à suprrimer
     * 
     * @return void
     * @access public
     */
    public function delete($id = null)
    {
        $this->Competence->id = $id;

        if (!$this->Competence->exists()) {
            $this->Session->setFlash(__('Enregistrement introuvable.', true), 'message_error');
        } else {
            $this->Competence->removeFromTree($id, true);
            $this->Session->setFlash(__('Données supprimées.', true), 'message_succes');
        }

        $this->redirect($this->referer());
    }
}

?>
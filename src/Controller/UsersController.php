<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow('add');
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Ads','Articles', 'UserImages', 'UserMessages',]

        ]);
        if($id==$this->Auth->User('id')) {
            $autoriser= true;
        }
        else{
            $autoriser=false;
        }
        $this->set('user', $user);
        $this->set('autoriser',$autoriser);
        $this->set('_serialize', ['user']);

    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $image = NULL;
        if (!empty($_FILES['profil_picture']) ) {
            $image = $_FILES['profil_picture']['name'];
            $extention = explode('.', $image);
            $rename = str_replace($extention[0],Time::now()->format("Ymdhms"),$image);
            $temp = $_FILES['profil_picture']['tmp_name'];
            move_uploaded_file($temp, WWW_ROOT . "img/" . $rename);
        }

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->profil_picture = $rename ;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Nouvel utilisateur crée.'));

                return $this->redirect(['controller'=>'Articles', 'action' => 'index']);


            } else {
                $this->Flash->error(__('Erreur.'));
            }
        }
        $Sexes = $this->Users->Sexes->find('list', [
            'valueField'=> 'description']);



        $this->set(compact('user','Sexes'));
        $this->set('_serialize', ['user']);
    }


    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($id!=$this->Auth->User('id')){
            return $this->redirect(['controller'=>'Articles', 'action' => 'index',]);
        }
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('informations modifiées.'));

                return $this->redirect(['controller'=>'Articles', 'action' => 'index']);
            } else {
                $this->Flash->error(__('Erreur.'));
            }
        }
        $Sexes = $this->Users->Sexes->find('list', [
            'valueField'=> 'description']);

        $this->set(compact('user','Sexes'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Utilisateur supprimé.'));
        } else {
            $this->Flash->error(__('Erreur.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

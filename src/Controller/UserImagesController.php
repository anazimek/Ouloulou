<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserImages Controller
 *
 * @property \App\Model\Table\UserImagesTable $UserImages
 */
class UserImagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $userImages = $this->paginate($this->UserImages);

        $this->set(compact('userImages'));
        $this->set('_serialize', ['userImages']);
    }

    /**
     * View method
     *
     * @param string|null $id User Image id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userImage = $this->UserImages->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userImage', $userImage);
        $this->set('_serialize', ['userImage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userImage = $this->UserImages->newEntity();
        if ($this->request->is('post')) {
            $userImage = $this->UserImages->patchEntity($userImage, $this->request->data);
            if ($this->UserImages->save($userImage)) {
                $this->Flash->success(__('The user image has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user image could not be saved. Please, try again.'));
            }
        }
        $users = $this->UserImages->Users->find('list', ['limit' => 200]);
        $this->set(compact('userImage', 'users'));
        $this->set('_serialize', ['userImage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Image id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userImage = $this->UserImages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userImage = $this->UserImages->patchEntity($userImage, $this->request->data);
            if ($this->UserImages->save($userImage)) {
                $this->Flash->success(__('The user image has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user image could not be saved. Please, try again.'));
            }
        }
        $users = $this->UserImages->Users->find('list', ['limit' => 200]);
        $this->set(compact('userImage', 'users'));
        $this->set('_serialize', ['userImage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Image id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userImage = $this->UserImages->get($id);
        if ($this->UserImages->delete($userImage)) {
            $this->Flash->success(__('The user image has been deleted.'));
        } else {
            $this->Flash->error(__('The user image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

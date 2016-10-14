<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserMessages Controller
 *
 * @property \App\Model\Table\UserMessagesTable $UserMessages
 */
class UserMessagesController extends AppController
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
        $userMessages = $this->paginate($this->UserMessages);

        $this->set(compact('userMessages'));
        $this->set('_serialize', ['userMessages']);
    }

    /**
     * View method
     *
     * @param string|null $id User Message id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userMessage = $this->UserMessages->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userMessage', $userMessage);
        $this->set('_serialize', ['userMessage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userMessage = $this->UserMessages->newEntity();
        if ($this->request->is('post')) {
            $userMessage = $this->UserMessages->patchEntity($userMessage, $this->request->data);
            if ($this->UserMessages->save($userMessage)) {
                $this->Flash->success(__('The user message has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user message could not be saved. Please, try again.'));
            }
        }
        $users = $this->UserMessages->Users->find('list', ['limit' => 200]);
        $this->set(compact('userMessage', 'users'));
        $this->set('_serialize', ['userMessage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Message id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userMessage = $this->UserMessages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userMessage = $this->UserMessages->patchEntity($userMessage, $this->request->data);
            if ($this->UserMessages->save($userMessage)) {
                $this->Flash->success(__('The user message has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user message could not be saved. Please, try again.'));
            }
        }
        $users = $this->UserMessages->Users->find('list', ['limit' => 200]);
        $this->set(compact('userMessage', 'users'));
        $this->set('_serialize', ['userMessage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Message id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userMessage = $this->UserMessages->get($id);
        if ($this->UserMessages->delete($userMessage)) {
            $this->Flash->success(__('The user message has been deleted.'));
        } else {
            $this->Flash->error(__('The user message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdMessages Controller
 *
 * @property \App\Model\Table\AdMessagesTable $AdMessages
 */
class AdMessagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ads']
        ];
        $adMessages = $this->paginate($this->AdMessages);

        $this->set(compact('adMessages'));
        $this->set('_serialize', ['adMessages']);
    }

    /**
     * View method
     *
     * @param string|null $id Ad Message id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adMessage = $this->AdMessages->get($id, [
            'contain' => ['Ads']
        ]);

        $this->set('adMessage', $adMessage);
        $this->set('_serialize', ['adMessage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adMessage = $this->AdMessages->newEntity();
        if ($this->request->is('post')) {
            $adMessage = $this->AdMessages->patchEntity($adMessage, $this->request->data);
            if ($this->AdMessages->save($adMessage)) {
                $this->Flash->success(__('The ad message has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ad message could not be saved. Please, try again.'));
            }
        }
        $ads = $this->AdMessages->Ads->find('list', ['limit' => 200]);
        $this->set(compact('adMessage', 'ads'));
        $this->set('_serialize', ['adMessage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad Message id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adMessage = $this->AdMessages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adMessage = $this->AdMessages->patchEntity($adMessage, $this->request->data);
            if ($this->AdMessages->save($adMessage)) {
                $this->Flash->success(__('The ad message has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ad message could not be saved. Please, try again.'));
            }
        }
        $ads = $this->AdMessages->Ads->find('list', ['limit' => 200]);
        $this->set(compact('adMessage', 'ads'));
        $this->set('_serialize', ['adMessage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad Message id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adMessage = $this->AdMessages->get($id);
        if ($this->AdMessages->delete($adMessage)) {
            $this->Flash->success(__('The ad message has been deleted.'));
        } else {
            $this->Flash->error(__('The ad message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

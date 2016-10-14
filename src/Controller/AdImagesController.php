<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdImages Controller
 *
 * @property \App\Model\Table\AdImagesTable $AdImages
 */
class AdImagesController extends AppController
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
        $adImages = $this->paginate($this->AdImages);

        $this->set(compact('adImages'));
        $this->set('_serialize', ['adImages']);
    }

    /**
     * View method
     *
     * @param string|null $id Ad Image id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adImage = $this->AdImages->get($id, [
            'contain' => ['Ads']
        ]);

        $this->set('adImage', $adImage);
        $this->set('_serialize', ['adImage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adImage = $this->AdImages->newEntity();
        if ($this->request->is('post')) {
            $adImage = $this->AdImages->patchEntity($adImage, $this->request->data);
            if ($this->AdImages->save($adImage)) {
                $this->Flash->success(__('The ad image has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ad image could not be saved. Please, try again.'));
            }
        }
        $ads = $this->AdImages->Ads->find('list', ['limit' => 200]);
        $this->set(compact('adImage', 'ads'));
        $this->set('_serialize', ['adImage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad Image id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adImage = $this->AdImages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adImage = $this->AdImages->patchEntity($adImage, $this->request->data);
            if ($this->AdImages->save($adImage)) {
                $this->Flash->success(__('The ad image has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ad image could not be saved. Please, try again.'));
            }
        }
        $ads = $this->AdImages->Ads->find('list', ['limit' => 200]);
        $this->set(compact('adImage', 'ads'));
        $this->set('_serialize', ['adImage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad Image id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adImage = $this->AdImages->get($id);
        if ($this->AdImages->delete($adImage)) {
            $this->Flash->success(__('The ad image has been deleted.'));
        } else {
            $this->Flash->error(__('The ad image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

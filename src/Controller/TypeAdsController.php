<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypeAds Controller
 *
 * @property \App\Model\Table\TypeAdsTable $TypeAds
 */
class TypeAdsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $typeAds = $this->paginate($this->TypeAds);

        $this->set(compact('typeAds'));
        $this->set('_serialize', ['typeAds']);
    }

    /**
     * View method
     *
     * @param string|null $id Type Ad id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typeAd = $this->TypeAds->get($id, [
            'contain' => ['Ads']
        ]);

        $this->set('typeAd', $typeAd);
        $this->set('_serialize', ['typeAd']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typeAd = $this->TypeAds->newEntity();
        if ($this->request->is('post')) {
            $typeAd = $this->TypeAds->patchEntity($typeAd, $this->request->data);
            if ($this->TypeAds->save($typeAd)) {
                $this->Flash->success(__('The type ad has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The type ad could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('typeAd'));
        $this->set('_serialize', ['typeAd']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Type Ad id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typeAd = $this->TypeAds->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typeAd = $this->TypeAds->patchEntity($typeAd, $this->request->data);
            if ($this->TypeAds->save($typeAd)) {
                $this->Flash->success(__('The type ad has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The type ad could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('typeAd'));
        $this->set('_serialize', ['typeAd']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Type Ad id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typeAd = $this->TypeAds->get($id);
        if ($this->TypeAds->delete($typeAd)) {
            $this->Flash->success(__('The type ad has been deleted.'));
        } else {
            $this->Flash->error(__('The type ad could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

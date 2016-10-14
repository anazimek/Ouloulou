<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Ads Controller
 *
 * @property \App\Model\Table\AdsTable $Ads
 */
class AdsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'TypeAds', 'Towns']
        ];
        $ads = $this->paginate($this->Ads);

        $this->set(compact('ads'));
        $this->set('_serialize', ['ads']);
    }

    /**
     * View method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('ads');
        $this->loadModel('users');
        $this->loadModel('type_ads');
        $this->loadModel('towns');
        $ads = $this->Ads->get($id, [
            'contain' => ['Users', 'TypeAds', 'Towns', 'AdImages', 'AdMessages']
        ]);
        $typeAds = $this->type_ads->findAllById($ads['type_ad_id'])->toArray();
        $Towns = $this->towns->findAllById($ads['town_id'])->toArray();
        $users = $this->users->findAllById($ads['user_id'])->toArray();

        $this->set(compact('ads','typeAds', 'users', 'Towns', 'id'));
        $this->set('_serialize', ['ad']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ad = $this->Ads->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['user_id'] = $this->Auth->User('id');
            $ad = $this->Ads->patchEntity($ad, $this->request->data);
            if ($this->Ads->save($ad)) {
                $picture = $this->Upload->getPicture($this->request->data['picture'],'ad',$ad->id);
                $this->request->data['picture_url'] = $picture;
                $ad = $this->Ads->patchEntity($ad , $this->request->data);
                $this->Ads->save($ad);
                $this->Flash->success(__('The ad has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ad could not be saved. Please, try again.'));
            }
        }
        $users = $this->Ads->Users->find('list', ['limit' => 200]);
        $typeAds = $this->Ads->TypeAds->find('list', ['valueField'=> 'type_name']);
        $towns = $this->Ads->Towns->find('list',['valueField'=> 'town_name']);
        $this->set(compact('ad', 'users', 'typeAds', 'towns'));
        $this->set('_serialize', ['ad']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ad = $this->Ads->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ad = $this->Ads->patchEntity($ad, $this->request->data);
            if ($this->Ads->save($ad)) {
                $this->Flash->success(__('The ad has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ad could not be saved. Please, try again.'));
            }
        }
        $users = $this->Ads->Users->find('list', ['limit' => 200]);
        $typeAds = $this->Ads->TypeAds->find('list', ['limit' => 200]);
        $towns = $this->Ads->Towns->find('list', ['limit' => 200]);
        $this->set(compact('ad', 'users', 'typeAds', 'towns'));
        $this->set('_serialize', ['ad']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ad = $this->Ads->get($id);
        if ($this->Ads->delete($ad)) {
            $this->Flash->success(__('The ad has been deleted.'));
        } else {
            $this->Flash->error(__('The ad could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

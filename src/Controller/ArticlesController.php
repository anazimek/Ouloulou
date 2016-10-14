<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $this->loadModel('ads');

        $this->paginate = [
            'contain' => ['Users']
        ];

        $articles = $this->Articles->find('all', [
            'contain' => ['Users'],
            'order' => ['Articles.created' => 'desc'],
        ]);

        $ads = $this->ads->find('all', [
            'order' => ['created' => 'desc'],
            'limit' => 5
        ]);



        $this->set(compact('articles','ads','img'));
        $this->set('_serialize', ['articles']);
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('users');
        $article = $this->Articles->get($id, [
            'contain' => ['Users','Comments']
        ]);
        $users = $this->users->findAllById($article['user_id'])->toArray();
        $this->set(compact( 'users'));

        $this->set('article', $article);
        $this->set('_serialize', ['article']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['user_id'] = $this->Auth->User('id');
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Post enregistré.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erreur.'));
            }
        }
        $users = $this->Articles->Users->find('list', ['valueField'=> 'username']);
        $this->set(compact('article', 'users'));
        $this->set('_serialize', ['article']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Post modifié.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erreur.'));
            }
        }
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $this->set(compact('article', 'users'));
        $this->set('_serialize', ['article']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('Post Supprimé.'));
        } else {
            $this->Flash->error(__('Erreur.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

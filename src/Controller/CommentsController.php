<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Comments Controller
 *
 * @property \App\Model\Table\CommentsTable $Comments
 */
class CommentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $comments = $this->paginate($this->Comments);

        $this->set(compact('comments'));
        $this->set('_serialize', ['comments']);
    }

    /**
     * View method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comment = $this->Comments->get($id, [
            'contain' => []
        ]);

        $this->set('comment', $comment);
        $this->set('_serialize', ['comment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $comment = $this->Comments->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['article_id'] = $id;
            $this->request->data['user_id'] = $this->Auth->User('id');
            $comment = $this->Comments->patchEntity($comment, $this->request->data);
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('Le commentaire à été sauvegarder.'));

                return $this->redirect(['controller' => 'Articles' ,'action' => 'index']);
            } else {
                $this->Flash->error(__('Erreur.'));
            }
        }

        $Articles = $this->Comments->Articles->find('list', [
            'valueField'=> 'description']);

        $Users = $this->Comments->Users->find('list', [
            'valueField'=> 'username']);

        $this->set(compact('comment','Articles','Users'));
        $this->set('_serialize', ['comment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comment = $this->Comments->get($id, [
            'contain' => []
        ]);

        $article_id = $this->Comments->find('all', [
            'fields' => [
                'id' => 'article_id'
            ],
            'conditions'=> [
                'Comments.id' => $id
            ]
        ])->first();

        $users = $this->Comments->Users->find('list', [
            'valueField'=> 'username']);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['article_id'] = $article_id->id;
            $this->request->data['user_id'] = $this->Auth->User('id');
            $comment = $this->Comments->patchEntity($comment, $this->request->data);
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('Le commentaire à bien été modifié.'));

                return $this->redirect(['controller' => 'Articles' ,'action' => 'index']);
            } else {
                $this->Flash->error(__('Erreur.'));
            }
        }
        $this->set(compact('comment','users','articles'));
        $this->set('_serialize', ['comment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comment = $this->Comments->get($id);
        if ($this->Comments->delete($comment)) {
            $this->Flash->success(__('Le commentaire à bien été supprimé.'));
            return $this->redirect(['controller' => 'Articles' ,'action' => 'index']);
        } else {
            $this->Flash->error(__('Erreur.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

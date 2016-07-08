<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Members Controller
 *
 * @property \App\Model\Table\MembersTable $Members
 */
class MembersController extends AppController
{
    //public $theme = 'frontend';
    /*public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout']);
    }

    public function login(){
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            return $this->Flash->error(__('Invalid username or password.'));
        }
    }

    public function logout(){
        return $this->redirect($this->Auth->logout());
    }*/

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Search.Prg', [
            'action' => ['index']
        ]);
    }


    // function for getting states

    public function getStates($id)
    {
        $result = array('success' => false);
        $this->viewBuilder()->layout(false);
        $this->render(false);

        if ($this->request->is('ajax')) {
            $states = $this->Members->States->find()
                ->where(['States.country_id' => $id])
                ->select(['States.id', 'States.state'])->toList();
            // debug($states);exit;
            
            if (!empty($states)) {
                $result['success'] = true;
                $result['data'] = $states;
            }

            return $this->_sendJson($result);
        }
    }

    public function getCities($id)
    {
        $result = array('success' => false);
        $this->viewBuilder()->layout(false);
        $this->render(false);

        if($this->request->is('ajax')){
            $cities = $this->Members->Cities->find()
                ->where(['Cities.state_id' => $id])
                ->select(['Cities.id', 'Cities.city'])->toList();
            // debug($cities);exit;
        
            if (!empty($cities)) {
                $result['success'] = true;
                $result['data'] = $cities;
            }

            return $this->_sendJson($result);
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Countries', 'States', 'Cities']
        ];
        $members = $this->paginate($this->Members);

        $this->set(compact('members'));
        $this->set('_serialize', ['members']);


        $query = $this->Members
            ->find('search', ['search' => $this->request->query]);
            // ->where(['username IS NOT' => null]);

        $this->set('members', $this->paginate($query));
        
        /*$result = $this->Members->find('all')->all();

        $row = $result->first()->username;
        debug($row);
        $row = $result->last()->username;
        debug($row);*/
    }

    /**
     * View method
     *
     * @param string|null $id Member id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $member = $this->Members->get($id, [
            'contain' => ['Countries', 'States', 'Cities']
        ]);

        $this->set('member', $member);
        $this->set('_serialize', ['member']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $member = $this->Members->newEntity();
        if ($this->request->is('post')) {
            $member = $this->Members->patchEntity($member, $this->request->data);
            if ($this->Members->save($member)) {
                $this->Flash->success(__('The member has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The member could not be saved. Please, try again.'));
            }
        }
        $countries = $this->Members->Countries->find('list', ['limit' => 200]);
        $states = $this->Members->States->find('list', ['limit' => 200]);
        $cities = $this->Members->Cities->find('list', ['limit' => 200]);
        // $this->set(compact('member', 'countries', 'states', 'cities'));
        $this->set(compact('member', 'countries'));
        $this->set('_serialize', ['member']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Member id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $member = $this->Members->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $member = $this->Members->patchEntity($member, $this->request->data);
            if ($this->Members->save($member)) {
                $this->Flash->success(__('The member has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The member could not be saved. Please, try again.'));
            }
        }
        $countries = $this->Members->Countries->find('list', ['limit' => 200]);
        $states = $this->Members->States->find('list', ['limit' => 200]);
        $cities = $this->Members->Cities->find('list', ['limit' => 200]);
        $this->set(compact('member', 'countries', 'states', 'cities'));
        $this->set('_serialize', ['member']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Member id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $member = $this->Members->get($id);
        if ($this->Members->delete($member)) {
            $this->Flash->success(__('The member has been deleted.'));
        } else {
            $this->Flash->error(__('The member could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

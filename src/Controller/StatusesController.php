<?php
namespace TicketSystem\Controller;

use TicketSystem\Controller\AppController;

/**
 * Statuses Controller
 *
 * @property \TicketSystem\Model\Table\StatusesTable $Statuses
 */
class StatusesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('statuses', $this->paginate($this->Statuses));
        $this->set('_serialize', ['statuses']);
    }

    /**
     * View method
     *
     * @param string|null $id Status id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $status = $this->Statuses->get($id, [
            'contain' => ['Tickets']
        ]);
        $this->set('status', $status);
        $this->set('_serialize', ['status']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $status = $this->Statuses->newEntity();
        if ($this->request->is('post')) {
            $status = $this->Statuses->patchEntity($status, $this->request->data);
            if ($this->Statuses->save($status)) {
                $this->Flash->success('The status has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The status could not be saved. Please, try again.');
            }
        }
        $this->set(compact('status'));
        $this->set('_serialize', ['status']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Status id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $status = $this->Statuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $status = $this->Statuses->patchEntity($status, $this->request->data);
            if ($this->Statuses->save($status)) {
                $this->Flash->success('The status has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The status could not be saved. Please, try again.');
            }
        }
        $this->set(compact('status'));
        $this->set('_serialize', ['status']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Status id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $status = $this->Statuses->get($id);
        if ($this->Statuses->delete($status)) {
            $this->Flash->success('The status has been deleted.');
        } else {
            $this->Flash->error('The status could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}

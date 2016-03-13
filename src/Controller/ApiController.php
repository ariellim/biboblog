<?php
namespace App\Controller;

use App\Controller\AppController;


/**
 * Api Controller
 *
 * @property \App\Model\Table\ApiTable $Api
 */
class ApiController extends AppController
{
    public $http_status = ['success'=>200,'bad_request'=>400,'forbidden'=>403,'request_time_out'=>408,'internal_server_error'=>500];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadModel('Blogs');
        
        $this->Auth->allow(['getAllBlog','create','edit','delete']);
        
        $this->layout = 'ajax';
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function getAllBlog()
    {
        $this->request->allowMethod(['get']);
        
        $blogs = $this->Blogs->find('all');       
        
        $message = 'success';
        
        $this->response->type('json');
        $this->response->statusCode($this->http_status[$message]);
        $this->response->body(json_encode(
            array('status' => $message, 'blogs' => $blogs)));
        $this->response->send();
        die();
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function create()
    {
        $this->request->allowMethod(['post']);
        
        $blog = $this->Blogs->newEntity();
        if ($this->request->is('post')) {
            $blog = $this->Blogs->patchEntity($blog, $this->request->data);
            if ($this->Blogs->save($blog)) {
                $message = 'success';
            } else {
                $message = 'bad_request';
            }
        }
        $this->response->type('json');
        $this->response->statusCode($this->http_status[$message]);
        $this->response->body(json_encode(
            array('status' => $message, 'blog' => $blog)));
        $this->response->send();
        die();
    }

    /**
     * Edit method
     *
     * @param string|null $id Api id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        
        $blog = $this->Blogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blog = $this->Blogs->patchEntity($blog, $this->request->data);
            if ($this->Blogs->save($blog)) {
                $message = 'success';
            } else {
                $message = 'bad_request';
            }
        }
        $this->response->type('json');
        $this->response->statusCode($this->http_status[$message]);
        $this->response->body(json_encode(
            array('status' => $message, 'blog' => $blog)));
        $this->response->send();
        die();
    }

    /**
     * Delete method
     *
     * @param string|null $id Api id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        $this->request->allowMethod(['post', 'delete']);
        
        $id = $this->request->data['id'];
        $blog = $this->Blogs->get($id);
        if ($this->Blogs->delete($blog)) {
            $message = 'success';
        } else {
            $message = 'bad_request';
        }
        $this->response->type('json');
        $this->response->statusCode($this->http_status[$message]);
        $this->response->body(json_encode(
            array('status' => $message)));
        $this->response->send();
        die();
    }
}

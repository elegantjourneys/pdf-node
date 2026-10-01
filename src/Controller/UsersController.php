<?php

declare(strict_types=1);



namespace App\Controller;



use Cake\Core\Configure;

use Cake\Http\Exception\ForbiddenException;

use Cake\Http\Exception\NotFoundException;

use Cake\Http\Response;

use Cake\View\Exception\MissingTemplateException;



class UsersController extends AppController

{

  public function initialize(): void
  {
      parent::initialize();

      // Load the Authentication component
      $this->loadComponent('Authentication.Authentication');

      // Allow unauthenticated access to ALL actions in this controller
      //$this->Authentication->allowUnauthenticated();
       //$this->Authentication->addUnauthenticatedActions(['login']);
    // Allow 'login' action to be accessed without authentication
    $this->Authentication->allowUnauthenticated(['login']);
  }

  public function beforeFilter(\Cake\Event\EventInterface $event)

  {

    parent::beforeFilter($event);

    // Configure the login action to not require authentication, preventing

    // the infinite redirect loop issue

   

  }





  public function login()

  {

    //print_r( $this->Authentication->getResult());exit;

    $this->viewBuilder()->setLayout('sign-in-up');

    $this->request->allowMethod(['get', 'post']);

    $result = $this->Authentication->getResult();

    // regardless of POST or GET, redirect if user is logged in
    //echo "<pre>";
    //print_r($result->isValid());exit;

    if ($result->isValid()) {

      // redirect to /admin after login success
//echo "login success";exit;
      $redirect = $this->request->getQuery('redirect', [

        'plugin' => 'admin',

        'controller' => 'dashboard',

        'action' => 'index'

      ]);



      return $this->redirect($redirect);

    }

    // display error if user submitted and authentication failed

    if ($this->request->is('post') && !$result->isValid()) {

      $this->Flash->error(__('Invalid username or password'));

    }

  }



  public function logout()

  {

    $result = $this->Authentication->getResult();

    // regardless of POST or GET, redirect if user is logged in

    if ($result->isValid()) {

      $this->Authentication->logout();

      return $this->redirect(['controller' => 'Users', 'action' => 'login']);

    }

  }



  public function register()

  {

    $this->viewBuilder()->setLayout('sign-in-up');



    $this->render("register");

  }



  public function index()

  {

      $users = $this->paginate($this->Users);



      $this->set(compact('users'));

  }

   /**

     * Edit method

     *

     * @param string|null $id User id.

     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.

     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.

     */

    public function edit($id = null)

    {

        $user = $this->Users->get($id, [

            'contain' => [],

        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {

                $this->Flash->success(__('The user has been saved.'));



                return $this->redirect(['action' => 'index']);

            }

            $this->Flash->error(__('The user could not be saved. Please, try again.'));

        }

        $this->set(compact('user'));

    }

}


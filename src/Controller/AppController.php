<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Routing\Router;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $jsVars = array();

    public function setJsVars($name, $value)
    {
        $this->jsVars[$name] = $value;
    }

    public function _sendJson($data, $jsonHeaders = true)
    {
        $this->set(compact('data', 'jsonHeaders'));
        $this->viewBuilder()->layout(false);
        $this->render(false);

        $this->response->disableCache();
        $this->response->modified('now');
        $this->response->checkNotModified($this->request);

        $this->response->body(json_encode($data));
        $this->response->statusCode(200);
        $this->response->type('application/json');

        return $this->response;
    }

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ]
        ]);
     
        // Set the layout
        //$this->layout = 'frontend';
        $this->viewBuilder()->layout('frontend');

        // set session variable
        $session = $this->request->session()->read('Auth.User.username');
        $this->set('session', $session);
    }

    public function beforeFilter(Event $event){
        parent::beforeFilter($event);

        return $this->Auth->allow(['logout', 'display', 'index']);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        $this->setJsVars('url', Router::url('/', true));
        $this->set('jsVars', $this->jsVars);
        // debug($this->jsVars);exit;
    }
}

<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array('Paginator', 'Session', 'Cookie', 'RequestHandler');
	public function beforeRender(){
		$this->response->disableCache();
		//$this->set('fb_login_url', $this->Facebook->getLoginUrl(array('redirect_uri' => Router::url(array('controller' => 'users', 'action' => 'login'), true))));
		//$this->set('user', $this->Auth->user());
		//$user_fb = $this->Facebook->getUser();
		$this->set('base_url', $this->webroot);
		//pr($_SERVER);exit;
		//$this->set('base_url', 'http://'.$_SERVER['HTTP_HOST'].Router::url('/'));
		//date_default_timezone_set("'Africa/Lagos'");
		/* Social Icon Dynamic Function */
		//echo $base_url;exit;

		$this->set('BackURL', @$_SERVER['HTTP_REFERER']);
	}

	public function beforeFilter()
	{ 

		//$this->response->disableCache();
		//clearCache(null, 'models');
		//=====Clean Cache Memory=============
		/* if(Configure::read('debug') > 0 and isset($this->params['url']['emptycache'])) {
        // clear Cache::write() items
        Cache::clear();
        // clear core cache
        $cachePaths = array('views', 'persistent', 'models');
        foreach($cachePaths as $config) {
            clearCache(null, $config);
        }
        $this->Session->setFlash('Cache cleared', 'default', array(), 'info');
    }*/
		//=====================================
		
		$this->loadModel("SocialIcon");
		$social_options = array(
			'order' =>array('SocialIcon.orderno' => 'asc')
			);
		$this->set('socialSettings',$this->SocialIcon->find('all',$social_options));

		/* Sitesetting Dynamic Function */
		$this->loadModel("Sitesetting");
		$this->set('siteSettings',$this->Sitesetting->find('first'));
		
		/* News Slider Dynamic Function */
		$this->loadModel('News');
		$newsRes=$this->News->find('all', array(
								'conditions' => array('status' => 1), 
								'order' =>array('News.	news_id' => 'desc')
								));
		$this->set('newsRes',$newsRes);
		//pr($this->request->params);
		//pr($_SERVER);
		if($this->request->params['controller'] == 'Contacts' && $this->request->params['action'] == 'index'){
			$this->set('pageID', 8);
		}
		else{
			//$pathURL = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				//echo 1;
			$this->set('pageID', 0);
		}
		if($this->Session->check('loginID')){
			$loginID=$this->Session->read('loginID');
			$loginType=$this->Session->read('loginType');
			$this->loadModel('MasterUser');
			$userres=$this->MasterUser->find('first', array('conditions' => array('id' => $loginID)));
			$this->set('LoginRes', $userres);
			$this->set('loginType',$loginType);

		}	
		
	}
	
}

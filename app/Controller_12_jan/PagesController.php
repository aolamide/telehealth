<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/*App::import('Vendor', 'Mailer', array('file' => 'Mailer/PHPMailer.php'));*/
//App::uses('AppHelper', 'View/Helper');
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
	public $components = array('Paginator', 'Session', 'Cookie','RequestHandler');
	// public $helpers = array('Dez');
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	
	public function slugName($slug='',$postName='')
	{

		if($slug!='')
		{

			$this->loadModel('AdminPage');
			$pageDetail=$this->AdminPage->find('first', array('conditions' => array('page_slug'=>$slug, 'is_active' => 1)));
			if(count($pageDetail)>0){
				$pageID=$pageDetail['AdminPage']['pid'];
				$page_title=stripslashes($pageDetail['AdminPage']['page_name']);
				$meta_title=stripslashes($pageDetail['AdminPage']['meta_title']);
				$pageTitle = ($meta_title!='') ? $meta_title : $page_title;
				switch($slug){
					case 'news-detail':
					if($postName!=''){
						$this->loadModel('News');
						$newsDetail=$this->News->find('first', array('conditions' => array('slug'=>$postName, 'status' => 1)));
						if(count($newsDetail)>0){
							$this->set('title_for_layout',stripslashes($newsDetail['News']['news_title']));
							$this->set('newsDetail', $newsDetail['News']);
							$this->set('pageDetail', $pageDetail['AdminPage']);
							$this->layout="news-detail";
						}else{
							$this->set('title_for_layout','404 Not Found');
							$this->layout="404";
						}
					}else{
						$this->set('title_for_layout','404 Not Found');
						$this->layout="404";
					}
					break;
					case 'product-detail':
					if($postName!=''){
						$this->loadModel('Product');
						$productDetail=$this->Product->find('first', array('conditions' => array('slug'=>$postName, 'status' => 1)));
						if(count($productDetail)>0){
							$this->set('title_for_layout',stripslashes($productDetail['Product']['title']));
							$this->set('productDetail', $productDetail['Product']);
							$this->set('pageDetail', $pageDetail['AdminPage']);
							$this->layout="product-detail";
						}else{
							$this->set('title_for_layout','404 Not Found');
							$this->layout="404";
						}
					}else{
						$this->set('title_for_layout','404 Not Found');
						$this->layout="404";
					}
					break;
					default:
					if($pageID==5){
						$this->loadModel('News');
						$this->News->recursive = 0;
						$this->Paginator->settings=
							array(
								'conditions'=>array('status' => 1),
								'order' => array('news_id' => 'desc'),
								'limit' => 10
								);
						$this->set('newsRes', $this->Paginator->paginate('News'));
						$this->set('title_for_layout',$pageTitle);
						$this->set('pageDetail', $pageDetail['AdminPage']);
						$this->layout="news";
					}else if($pageID==6){
						$this->loadModel('Product');
						$this->Product->recursive = 0;
						$this->Paginator->settings=
							array(
								'conditions'=>array('status' => 1),
								'order' => array('id' => 'desc'),
								'limit' => 10
								);
						$this->set('productRes', $this->Paginator->paginate('Product'));
						$this->set('title_for_layout',$pageTitle);
						$this->set('pageDetail', $pageDetail['AdminPage']);
						$this->layout="product";
					}else{
						$this->set('title_for_layout',$pageTitle);
						$this->set('pageDetail', $pageDetail['AdminPage']);
						$this->layout="common-page";
					}
					break;
				
				}
				$this->set('pageID', $pageID);
			}else{
				$this->set('title_for_layout','404 Not Found');
				$this->layout="404";
			}
		}else{
			$this->set('title_for_layout','Home');
			$this->layout="home";
		}
	}
	 function getSubbrand(){
	   $this->layout='ajax';
	  $brand_id= $this->request->data['brand_id'];
	   $this->loadModel("ManageBrand");
		$sub_brand = $this->ManageBrand->find('list',array('conditions'=>array("ManageBrand.flag" => $brand_id,"ManageBrand.status"=>1), 'fields' => array('ManageBrand.brand_id','ManageBrand.brand_name')));
		//$this->set("sub_brand",$sub_brand);
		if(count($sub_brand)>0){
			echo "<option value=''>All Model</option>";
			foreach($sub_brand AS $key=>$val){
			echo "<option value=$key>$val</option>";
		}
		}else{
			echo "<option value=''>All Model</option>";
		}
		
		exit;
	   
   }
}

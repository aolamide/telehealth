<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Search Controller
 */
class SearchController extends AppController {

	public $components = array('Paginator', 'Session', 'Cookie', 'RequestHandler');
	
	public function index($searchtxt='')
	{
		$searchtxt = urldecode($searchtxt);
		$this->set('title_for_layout', 'search-'.$searchtxt);
		$this->loadModel('AdminPage');
		$pageList= $this->AdminPage->find('all', array(
			'conditions' => array(
				'OR' => array(
					'AdminPage.page_title like' => '%'.$searchtxt.'%',
					'AdminPage.page_desc like' => '%'.$searchtxt.'%',
					'AdminPage.sor_desc like' => '%'.$searchtxt.'%',
					),
				'AND' => array(
					'OR' => array('AdminPage.pid !=' => '9', 'AdminPage.pid !=' => '11')
					)
				)
			));
		$this->set('pageList', $pageList);
		$this->loadModel('News');
		$newsList= $this->News->find('all', array(
			'conditions' => array(
				'OR' => array(
					'News.news_title like' => '%'.$searchtxt.'%',
					'News.news_content like' => '%'.$searchtxt.'%',
					)
				)
			));
		$this->set('newsList', $newsList);
		$this->loadModel('Product');
		$productList= $this->Product->find('all', array(
			'conditions' => array(
				'OR' => array(
					'Product.title like' => '%'.$searchtxt.'%',
					'Product.desc like' => '%'.$searchtxt.'%',
					'Product.short_desc like' => '%'.$searchtxt.'%',
					)
				)
			));
		$this->set('productList', $productList);
		$this->set('searchtxt', $searchtxt);
		$this->layout="search";
	}
}

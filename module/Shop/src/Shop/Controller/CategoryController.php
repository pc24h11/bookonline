<?php
namespace Shop\Controller;

use Zendvn\Controller\ActionController;
use Zend\Form\FormInterface;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;

use Zendvn\Paginator\Paginator as ZendvnPaginator;

class CategoryController extends ActionController
{
	public function init(){
		
		// SESSION FILTER
		$this->_params['filter']['display']		= $this->params()->fromRoute('display', 'list');
		$this->_params['filter']['page']		= $this->params()->fromRoute('page',1);
		$this->_params['filter']['order']		= $this->params()->fromRoute('order','id');
		$this->_params['filter']['dir']			= $this->params()->fromRoute('dir','DESC');
		$this->_params['filter']['limit']		= $this->params()->fromRoute('limit',3);
		
		// PAGINATOR
		$this->_paginator['itemCountPerPage']	= (int)$this->_params['filter']['limit'];
		$this->_paginator['pageRange']			= 4;
		$this->_paginator['currentPageNumber']	= $this->params()->fromRoute('page',1);
		$this->_params['paginator']				= $this->_paginator;
		
		// OPTIONS
		$this->_options['tableName']	= 'Shop\Model\CategoryTable';
		$this->_options['formName']		= 'formAdminCategory';
		
		// DATA
		$this->_params['data']	= array_merge(
				$this->getRequest()->getPost()->toArray(),
				$this->getRequest()->getFiles()->toArray()
		);
		$this->_params['data']['id']		= $this->params('id');
	}
	
    public function indexAction()
    {	
    	// CATEGORY INFO
    	$categoryInfo	= $this->getTable()->getItem($this->_params['data'], array('task' => 'category-frontend'));
    	if(empty($categoryInfo)) $this->goError();
    	
    	// BREADCRUMB
    	$breadcrumb		= $this->getTable()->listItem($categoryInfo, array('task' => 'list-breadcrumb'));
    	
    	// LIST BOOK
    	$this->_params['data']['catIDs']	= $this->getTable()->listItem($categoryInfo, array('task' => 'list-branch'));
    	$bookTable	= $this->getServiceLocator()->get('Shop\Model\BookTable');
    	$total		= $bookTable->countItem($this->_params['data']['catIDs'], array('task' => 'list-item'));
    	$items		= $bookTable->listItem($this->_params, array('task' => 'book-in-category'));
    	
		// VIEW    	
    	$bookView	= new ViewModel(array('items' => $items));
    	$viewModel	= new ViewModel(array(
    			'categoryInfo'	=> $categoryInfo,
    			'breadcrumb'	=> $breadcrumb,
    			'paginator' 	=> ZendvnPaginator::createPaginator($total, $this->_params['paginator']),
    			'filter'		=> $this->_params['filter']	
    	));
    	
    	$bookView->setTemplate('shop/category/book-' . $this->_params['filter']['display']	);
    	$viewModel->addChild($bookView, 'listBook');
    	
    	return $viewModel;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

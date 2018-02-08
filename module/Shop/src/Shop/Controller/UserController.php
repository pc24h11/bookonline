<?php
namespace Shop\Controller;

use Zendvn\System\Info;

use Zendvn\Controller\ActionController;
use Zend\Form\FormInterface;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;

use Zendvn\Paginator\Paginator as ZendvnPaginator;

class UserController extends ActionController
{
	public function init(){
		// DATA
		$this->_params['data']	= array_merge(
				$this->params()->fromRoute(),
				$this->getRequest()->getFiles()->toArray(),
				$this->getRequest()->getPost()->toArray()
		);
	}
	
	public function activeAction()
	{
		$check	= $this->getTable()->getItem($this->_params['data'], array('task' => 'user-active'));
		if($check == 0) {
			return $this->redirect()->toRoute('shopRoute/default', array(
				'controller'	=> 'notice',
				'action'		=> 'active-finish',
			));
		}
		
 		$this->getTable()->saveItem($this->_params['data'], array('task' => 'user-active'));
		return $this->redirect()->toRoute('shopRoute/default', array(
				'controller'	=> 'notice',
				'action'		=> 'active-success',
		));
	}
	
	public function adminAction()
	{
		return $this->redirect()->toRoute('adminRoute/default', array(
				'controller'	=> 'index',
				'action'		=> 'index',
		));
	}
	
	public function orderAction(){
		$bookID		= $this->_params['data']['id'];
		$price		= $this->_params['data']['price'];
		$quantity	= $this->_params['data']['quantity'];
		
		$cartSS		= new Container(BOOKONLINE_KEY . '_cart');
		$cartSS->setExpirationSeconds(500);
		
		if(empty($cartSS->quantity)){
			$cartSS->quantity	= array($bookID => $quantity);
			$cartSS->price	= array($bookID => $price * $quantity);
		}else{
			if($cartSS->quantity[$bookID] > 0){
				$cartSS->quantity[$bookID]	+= $quantity;
				$cartSS->price[$bookID]		= $price * $cartSS->quantity[$bookID]; // A 3
			}else{
				$cartSS->quantity[$bookID]	= $quantity;
				$cartSS->price[$bookID]		= $price * $quantity;
			}
		}
		
		return $this->redirect()->toRoute('routeCart');
	}
	
	public function viewCartAction(){
		$bookTable	= $this->getServiceLocator()->get('Shop\Model\BookTable');
		$items		= $bookTable->listItem(null, array('task' => 'book-in-cart'));
		
		return new ViewModel(array(
				'items'		=>	$items,
		));
	}
	
	public function checkoutAction(){
		if($this->getRequest()->isPost()){
			$cartTable	= $this->getServiceLocator()->get('Shop\Model\CartTable');
			$cartTable->saveItem($this->_params['data'], array('task' => 'submit-cart'));
			$cartSS		= new Container(BOOKONLINE_KEY . '_cart');
			$cartSS->getManager()->getStorage()->clear(BOOKONLINE_KEY . '_cart');
		}
		return $this->redirect()->toRoute('routeHome');
	}
    
	public function historyAction(){
		$cartTable	= $this->getServiceLocator()->get('Shop\Model\CartTable');
		$items		= $cartTable->listItem(null, array('task' => 'view-history'));
		
		return new ViewModel(array(
				'items'		=>	$items,
		));
	}
}

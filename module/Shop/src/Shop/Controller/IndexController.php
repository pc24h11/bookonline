<?php
namespace Shop\Controller;

use Zend\Permissions\Acl\Role\GenericRole;

use Zend\Permissions\Acl\Acl;

use Zendvn\System\Info;

use Zend\Mime\Mime;

use Zend\Form\FormInterface;

use Zendvn\Controller\ActionController;
use Zend\View\Model\ViewModel;

class IndexController extends ActionController
{
	public function init(){
		// OPTIONS
		$this->_options['tableName']	= 'Admin\Model\UserTable';
		
		// DATA
		$this->_params['data']	= array_merge(
				$this->getRequest()->getPost()->toArray(),
				$this->getRequest()->getFiles()->toArray()
		);
	}
	
    public function indexAction()
    {
    }
    
    public function loginAction()
    {
    	$authService	= $this->getServiceLocator()->get('MyAuth');
    	if($this->identity()) $this->redirect()->toRoute('home');
    	
    	$myForm       	= $this->getServiceLocator()->get('FormElementManager')->get('formShopLogin');
    	
    	if($this->getRequest()->isPost()){
    		$myForm->setData($this->_params['data']);
    		if($myForm->isValid()){
    			$this->_params['data']		= $myForm->getData(FormInterface::VALUES_AS_ARRAY);
    			
    			if($authService->login($this->_params['data']) == true){
    				$userID		= $this->identity()->id;
    				$groupID	= $this->identity()->group_id;
    				 
    				$userTable			= $this->getServiceLocator()->get('Shop\Model\UserTable');
    				$groupTable			= $this->getServiceLocator()->get('Shop\Model\GroupTable');
    				$permissionTable	= $this->getServiceLocator()->get('Shop\Model\PermissionTable');
    				
    				$data['user']				= $userTable->getItem(array('id' => $userID), array('task' => 'store-user-info'));
    				$data['group']				= $groupTable->getItem(array('id' => $groupID), array('task' => 'store-group-info'));
    				$data['permission']['role']			= $data['group']->name;
    				$data['permission']['privileges']	= $permissionTable->getItem($data['group'], array('task' => 'store-permission-info'));
    				 
    				$infoObj		= new Info();
    				$infoObj->storeInfo($data);
    				
    				$this->redirect()->toRoute('home');
    			}
    		}
    	}
    	return array(
    			'myForm'		=> $myForm,
    			'msgError'		=> $authService->getError(),
    	);
    }
    
    public function logoutAction()
    {
    	$this->getServiceLocator()->get('MyAuth')->logout();
    	$infoObj		= new Info();
    	$infoObj->destroyInfo();
    	return $this->redirect()->toRoute('home');
    }
    
    // Php4567!
    public function registerAction()
    {
    	if($this->identity()) $this->redirect()->toRoute('home');
    	$myForm	= $this->getServiceLocator()->get('FormElementManager')->get('formShopRegister');
    	$myTable= $this->getServiceLocator()->get('Shop\Model\UserTable');
    	
    	if($this->getRequest()->isPost()){
    		 
    		$myForm->setData($this->_params['data']);
    		
    		if($myForm->isValid()){
    			$this->_params['data']		= $myForm->getData(FormInterface::VALUES_AS_ARRAY);
   				$id			= $myTable->saveItem($this->_params['data'], array('task' => 'user-register'));
     			$userInfo	= $myTable->getItem(array('id' => $id), array('task' => 'user-register'));
 				$mailObj	= new \Zendvn\Mail\Mail();
    			$linkActive	= $this->url()->fromRoute('shopRoute/active', array('id' => $userInfo->id, 'code' => $userInfo->active_code),array('force_canonical' => true));
    			$mailObj->sendMail($userInfo->fullname, $userInfo->email, $linkActive);
    			
    			return $this->redirect()->toRoute('shopRoute/default', array(
	    				'controller'=> 'notice',		
	    				'action'	=> 'register-success',		
    			));
    		}
    	}
    	
    	return new ViewModel(array(
    			'myForm'	=> $myForm,
    	));
    }
    
    
}

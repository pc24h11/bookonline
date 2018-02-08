<?php

namespace Zendvn\Controller;

use Zend\Permissions\Acl\Role\GenericRole;

use Zend\Permissions\Acl\Acl;

use Zend\Mvc\MvcEvent;

use Zend\Mvc\Controller\PluginManager;

use Zend\Mvc\Controller\AbstractActionController;

class ActionController extends AbstractActionController{
	
	protected $_tableObj;
	protected $_formObj;
	protected $_params;
	protected $_options   = array('tableName', 'formName');
	protected $_paginator = array(
			'itemCountPerPage'	=> 10,
			'pageRange'			=> 4,
	);
	
	public function setPluginManager(PluginManager $plugins){
		$this->getEventManager()->attach(MvcEvent::EVENT_DISPATCH, array($this, 'onInit'), 100);
		parent::setPluginManager($plugins);
	}
	
	public function onInit(MvcEvent $e){
		
		// GET MODULE - CONTROLLER - ACTION
		$routeMatch			= $e->getRouteMatch();
		$controllerArray	= explode('\\', $routeMatch->getParam('controller'));
		
		// SET MODULE - CONTROLLER - ACTION FOR $_PARAMS
		$this->_params['module']		= strtolower($controllerArray[0]);
		$this->_params['controller']	= strtolower($controllerArray[2]);
		$this->_params['action']		= $routeMatch->getParam('action');
		
		// SET MODULE - CONTROLLER - ACTION FOR VIEW
		$viewModel				= $e->getApplication()->getMvcEvent()->getViewModel();
		$viewModel->module		= $this->_params['module'];
		$viewModel->controller	= $this->_params['controller'];
		$viewModel->action		= $this->_params['action'];

		// SET LAYOUT
		$config		= $this->getServiceLocator()->get('config');
		$this->layout($config['module_layouts'][$controllerArray[0]]);
		
		// CHECK PERMISSION
		$loggedStatus	= $this->identity() ? true : false;
		if($this->_params['module'] == 'admin'){
			
			if($loggedStatus == false)	$this->goLogin();
			
			$infoObj	= new \Zendvn\System\Info();
			$groupAcp	= $infoObj->getGroupInfo('group_acp');
			
			if($loggedStatus == true && $groupAcp == 0) $this->goNoAccess();
			
// 			$permission	= $infoObj->getPermission();
// 			if($permission['privileges'] != 'full'){
// 				$aclObj	= new \Zendvn\System\Acl($permission['role'], $permission['privileges']);
// 				if($aclObj->isAllowed($this->_params) == false) $this->goNoAccess();
// 			}
			
		} else if($this->_params['module'] == 'shop'){
			if($this->_params['controller'] == 'user' && $loggedStatus == false) $this->goLogin();
		}
		
		
		$this->init();
	}
	
	public function init(){
		echo '<h3 style="color:red;">' . __METHOD__ . '</h3>';
	}
	
	public function getTable(){
		if(empty($this->_tableObj)) {
			$this->_tableObj = $this->getServiceLocator()->get($this->_options['tableName']);
		}
		return $this->_tableObj;
	}
	
	public function getForm(){
		if(empty($this->_formObj)) {
			$this->_formObj = $this->getServiceLocator()->get('FormElementManager')->get($this->_options['formName']);
		}
		return $this->_formObj;
	}
	
	public function goAction($actionInfo = null){
		$actionInfo['controller']	= !empty($actionInfo['controller']) ? $actionInfo['controller'] : $this->_params['controller'];
		$actionInfo['action']		= !empty($actionInfo['action']) ? $actionInfo['action'] : 'index';
		$actionInfo['id']			= !empty($actionInfo['id']) ? $actionInfo['id'] : null;
		return $this->redirect()->toRoute('adminRoute/default', array(
				'controller'=> $actionInfo['controller'], 
				'action' 	=> $actionInfo['action'],
				'id' 		=> $actionInfo['id'],
		));
	}
	
	public function goError(){
		return $this->redirect()->toRoute('shopRoute/default', array(
				'controller'	=> 'notice',
				'action'		=> 'no-data',
		));
	}
	
	public function goLogin(){
		
		$linkLogin = $this->getServiceLocator()->get('ViewHelperManager')->get('linkLogin');
		$response	= $this->getResponse();
		$response->setStatusCode(302);
		$response->getHeaders()->addHeaderLine('Location', $linkLogin());
		
		$this->getEvent()->stopPropagation();
		
		return $response;
		
	}
	
	public function goNoAccess(){
		
		$url	= $this->url()->fromRoute('shopRoute/default', array(
				'controller'	=> 'notice',
				'action'		=> 'no-access',
		));
		$response	= $this->getResponse();
		$response->setStatusCode(302);
		$response->getHeaders()->addHeaderLine('Location', $url);
		
		$this->getEvent()->stopPropagation();
		
		return $response;
	}
	
	
	
	
	
	
	
	
	
	
}
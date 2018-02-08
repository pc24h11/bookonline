<?php
namespace Zendvn\System;

class Authenticate {
	
	protected $_authService;
	protected $_msgError;
	
	public function __construct(\Zend\Authentication\AuthenticationService $authService){
		$this->_authService	= $authService;
	}
	
	public function login($arrParams = null, $options = null){
		$this->_authService->getAdapter()->setIdentity($arrParams['email']);
		$this->_authService->getAdapter()->setCredential($arrParams['password']);
		 
		$result	= $this->_authService->authenticate();
		
		if(!$result->isValid()){
			$this->_msgError	= 'Tài khoản đăng nhập chưa chính xác';
			return false;
		}else{
			$data	= $this->_authService->getAdapter()->getResultRowObject(array('id', 'email', 'group_id'));
			$this->_authService->getStorage()->write($data);
			return true;
		}
	}
	
	public function getError($arrParams = null, $options = null){
		if(!empty($this->_msgError)) return sprintf('<div class="warning">%s</div>',$this->_msgError);
		return null;
	}
	
	public function logout($arrParams = null, $options = null){
		$this->_authService->clearIdentity();
	}
}
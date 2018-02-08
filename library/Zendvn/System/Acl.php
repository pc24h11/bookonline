<?php
namespace Zendvn\System;

use Zend\Permissions\Acl\Role\GenericRole;

use Zend\Permissions\Acl\Acl as ZendAcl;

class Acl {
	
	protected $_role;
	protected $_privileges;
	protected $_acl;
	
	
	public function __construct($role, $privileges, $options = null){
		$this->_role		= $role;
		$this->_privileges	= $privileges;
		$this->_acl			= new ZendAcl();
		$this->_acl->addRole(new GenericRole($this->_role));
		$this->_acl->allow($this->_role, null, $this->_privileges);
	}
	
	public function isAllowed($arrParams, $options = null){
		$privilege	= $arrParams['module']. '||' . $arrParams['controller'] . '||' . $arrParams['action'];
			
		if($this->_acl->isAllowed($this->_role, null, $privilege)==false){
			return false;
		}
		
		return true;
	}
}
<?php
namespace Zendvn\System;

use Zend\Session\Container;

class Info {
	
	public function __construct(){
		$ssInfo	= new Container(BOOKONLINE_KEY . '_user');
	}
	
	public function storeInfo($data){
		$ssInfo	= new Container(BOOKONLINE_KEY . '_user');
		$ssInfo->setExpirationSeconds(1800);
		$ssInfo->user		= $data['user'];
		$ssInfo->group		= $data['group'];
		$ssInfo->permission	= $data['permission'];
	}
	
	public function destroyInfo(){
		$ssInfo	= new Container(BOOKONLINE_KEY . '_user');
		$ssInfo->getManager()->getStorage()->clear(BOOKONLINE_KEY . '_user');
		$ssInfo->getManager()->getStorage()->clear(BOOKONLINE_KEY . '_cart');
	}
	
	public function getUserInfo($element = null){
		$ssInfo		= new Container(BOOKONLINE_KEY . '_user');
		$userInfo	= $ssInfo->user;
		
		$result	= ($element == null) ? $userInfo : $userInfo->$element;
		return $result;
	}
	
	public function getGroupInfo($element = null){
		$ssInfo		= new Container(BOOKONLINE_KEY . '_user');
		$groupInfo	= $ssInfo->group;
	
		$result	= ($element == null) ? $groupInfo : $groupInfo->$element;
		return $result;
	}

	public function getPermission($element = null){
		$ssInfo			= new Container(BOOKONLINE_KEY . '_user');
		$permissionInfo	= $ssInfo->permission;
	
		$result	= ($element == null) ? $permissionInfo : $permissionInfo->$element;
		return $result;
	}
}
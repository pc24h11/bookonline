<?php
namespace Zendvn\Model\Entity;

class Permission {

	public $id;
	public $name;
	public $module;
	public $controller;
	public $action;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->name			= (!empty($data['name'])) ? $data['name'] : null;
		$this->module		= (!empty($data['module'])) ? $data['module'] : null;
		$this->controller	= (!empty($data['controller'])) ? $data['controller'] : null;
		$this->action		= (!empty($data['action'])) ? $data['action'] : null;

	}

}
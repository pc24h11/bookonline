<?php
namespace Zendvn\Model\Entity;

class Nested {

	public $id;
	public $name;
	public $status;
	public $parent;
	public $left;
	public $right;
	public $level;

	public function exchangeArray($data){
		$this->id		= (!empty($data['id'])) ? $data['id'] : null;
		$this->name		= (!empty($data['name'])) ? $data['name'] : null;
		$this->status	= (!empty($data['status'])) ? $data['status'] : 0;
		$this->parent	= (!empty($data['parent'])) ? $data['parent'] : null;
		$this->left		= (!empty($data['left'])) ? $data['left'] : null;
		$this->right	= (!empty($data['right'])) ? $data['right'] : null;
		$this->level	= (!empty($data['level'])) ? $data['level'] : null;
	}
	
	public function getArrayCopy(){
		$result = get_object_vars($this);
		$result['status']	= ($result['status'] == 1) ? 'active' : 'inactive';
		return $result;
	}

}
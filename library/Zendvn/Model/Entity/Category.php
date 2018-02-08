<?php
namespace Zendvn\Model\Entity;

class Category {

	public $id;
	public $name;
	public $status;
	public $description;
	public $created;
	public $created_by;
	public $modified;
	public $modified_by;
	public $parent;
	public $left;
	public $right;
	public $level;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->name			= (!empty($data['name'])) ? $data['name'] : null;
		$this->status		= (!empty($data['status'])) ? $data['status'] : 0;
		$this->description	= (!empty($data['description'])) ? $data['description'] : 0;
		$this->created		= (!empty($data['created'])) ? $data['created'] : null;
		$this->created_by	= (!empty($data['created_by'])) ? $data['created_by'] : null;
		$this->modified		= (!empty($data['modified'])) ? $data['modified'] : null;
		$this->modified_by	= (!empty($data['modified_by'])) ? $data['modified_by'] : null;
		$this->parent		= (!empty($data['parent'])) ? $data['parent'] : null;
		$this->left			= (!empty($data['left'])) ? $data['left'] : null;
		$this->right		= (!empty($data['right'])) ? $data['right'] : null;
		$this->level		= (!empty($data['level'])) ? $data['level'] : null;
	}
	
	public function getArrayCopy(){
		$result = get_object_vars($this);
		$result['status']	= ($result['status'] == 1) ? 'active' : 'inactive';
		return $result;
	}

}
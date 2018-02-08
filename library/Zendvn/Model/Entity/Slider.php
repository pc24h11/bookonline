<?php
namespace Zendvn\Model\Entity;

class Slider {

	public $id;
	public $name;
	public $description;
	public $price;
	public $picture;
	public $status;
	public $ordering;
	public $created;
	public $created_by;
	public $modified;
	public $modified_by;
	public $book_id;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->name			= (!empty($data['name'])) ? $data['name'] : null;
		$this->description	= (!empty($data['description'])) ? $data['description'] : null;
		$this->price		= (!empty($data['price'])) ? $data['price'] : null;
		$this->picture		= (!empty($data['picture'])) ? $data['picture'] : null;
		$this->status		= (!empty($data['status'])) ? $data['status'] : 0;
		$this->ordering		= (!empty($data['ordering'])) ? $data['ordering'] : null;
		$this->created		= (!empty($data['created'])) ? $data['created'] : null;
		$this->created_by	= (!empty($data['created_by'])) ? $data['created_by'] : null;
		$this->modified		= (!empty($data['modified'])) ? $data['modified'] : null;
		$this->modified_by	= (!empty($data['modified_by'])) ? $data['modified_by'] : null;
		$this->book_id		= (!empty($data['book_id'])) ? $data['book_id'] : null;

	}
	
	public function getArrayCopy(){
		$result = get_object_vars($this);
		$result['status']	= ($result['status'] == 1) ? 'active' : 'inactive';
		return $result;
	}

}
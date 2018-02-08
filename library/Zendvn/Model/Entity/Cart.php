<?php
namespace Zendvn\Model\Entity;

use Zend\Json\Json;

class Cart {

	public $id;
	public $username;
	public $books;
	public $prices;
	public $quantities;
	public $names;
	public $pictures;
	public $status;
	public $date;

	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->username		= (!empty($data['username'])) ? $data['username'] : null;
		$this->books		= (!empty($data['books'])) ? $data['books'] : null;
		$this->prices		= (!empty($data['prices'])) ? $data['prices'] : null;
		$this->quantities	= (!empty($data['quantities'])) ? $data['quantities'] : null;
		$this->names		= (!empty($data['names'])) ? $data['names'] : null;
		$this->pictures		= (!empty($data['pictures'])) ? $data['pictures'] : null;
		$this->status		= (!empty($data['status'])) ? $data['status'] : null;
		$this->date			= (!empty($data['date'])) ? $data['date'] : null;
	}
	
}
<?php
namespace Zendvn\Model\Entity;

class User {

	public $id;
	public $username;
	public $email;
	public $fullname;
	public $password;
	public $avatar;
	public $sign;
	public $register_time;
	public $register_ip;
	public $active_code;
	public $active_time;
	public $group_id;
	public $status;
	public $ordering;
	public $created;
	public $created_by;
	public $modified;
	public $modified_by;


	public function exchangeArray($data){
		$this->id			= (!empty($data['id'])) ? $data['id'] : null;
		$this->username		= (!empty($data['username'])) ? $data['username'] : null;
		$this->email		= (!empty($data['email'])) ? $data['email'] : null;
		$this->fullname		= (!empty($data['fullname'])) ? $data['fullname'] : null;
		$this->password		= (!empty($data['password'])) ? $data['password'] : null;
		$this->avatar		= (!empty($data['avatar'])) ? $data['avatar'] : null;
		$this->sign			= (!empty($data['sign'])) ? $data['sign'] : null;
		$this->register_time= (!empty($data['register_time'])) ? $data['register_time'] : null;
		$this->register_ip	= (!empty($data['register_ip'])) ? $data['register_ip'] : null;
		$this->active_code	= (!empty($data['active_code'])) ? $data['active_code'] : null;
		$this->active_time	= (!empty($data['active_time'])) ? $data['active_time'] : null;
		$this->group_id		= (!empty($data['group_id'])) ? $data['group_id'] : null;
		$this->status		= (!empty($data['status'])) ? $data['status'] : 0;
		$this->ordering		= (!empty($data['ordering'])) ? $data['ordering'] : null;
		$this->created		= (!empty($data['created'])) ? $data['created'] : null;
		$this->created_by	= (!empty($data['created_by'])) ? $data['created_by'] : null;
		$this->modified		= (!empty($data['modified'])) ? $data['modified'] : null;
		$this->modified_by	= (!empty($data['modified_by'])) ? $data['modified_by'] : null;

	}
	
	public function getArrayCopy(){
		$result = get_object_vars($this);
		$result['status']	= ($result['status'] == 1) ? 'active' : 'inactive';
		$result['group']	= $result['group_id'];
		unset($result['group_id']);

		return $result;
	}

}
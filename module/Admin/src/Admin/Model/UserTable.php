<?php
namespace Admin\Model;

use Zend\Db\Sql\Where;

use Zendvn\File\Image;

use PHPImageWorkshop\ImageWorkshop;

use Zendvn\File\Upload;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class UserTable extends AbstractTableGateway {
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway	= $tableGateway;
	}
	
	public function countItem($arrParam = null, $options = null){
		if($options['task'] == 'list-item') {
			
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$ssFilter	= $arrParam['ssFilter'];
				
				if(!empty($ssFilter['filter_status'])){
					$status	= ($ssFilter['filter_status'] == 'active') ? 1 : 0;
					$select->where->equalTo('user.status',$status);
				}
				
				if(!empty($ssFilter['filter_group'])){
					$select->where->equalTo('user.group_id',$ssFilter['filter_group']);
				}
				
				if(!empty($ssFilter['filter_keyword_type']) && !empty($ssFilter['filter_keyword_value'])){
					if($ssFilter['filter_keyword_type'] != 'all') {
						$select->where->like('user.' . $ssFilter['filter_keyword_type'], '%'.$ssFilter['filter_keyword_value'].'%');
					}else{
						$select->where->NEST
									  ->like('username', '%'.$ssFilter['filter_keyword_value'].'%')
									  ->or
									  ->equalTo('user.id', $ssFilter['filter_keyword_value'])
									  ->or
									  ->like('email', '%'.$ssFilter['filter_keyword_value'].'%')
									  ->UNNEST;
					}
				}
				
			})->count();
			
		}
		return $result;
	}
	
	public function listItem($arrParam = null, $options = null){
		
		if($options['task'] == 'list-item') {
			
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$paginator	= $arrParam['paginator'];
				$ssFilter	= $arrParam['ssFilter'];
				
				$select->columns(array(
							'id', 'username', 'email','status', 'ordering', 'avatar', 'created', 'created_by', 'fullname', 'modified', 'modified_by'
						))
						->join(
							array('g' => 'group'),
							'user.group_id = g.id',
							array('group_name' => 'name'), 
							$select::JOIN_LEFT
						)
						->limit($paginator['itemCountPerPage'])
						->offset(($paginator['currentPageNumber'] - 1) * $paginator['itemCountPerPage']);
				
				if(!empty($ssFilter['order_by']) && !empty($ssFilter['order'])){
						$select->order(array($ssFilter['order_by'] . ' ' . $ssFilter['order']));
				}
				
				if(!empty($ssFilter['filter_status'])){
					$status	= ($ssFilter['filter_status'] == 'active') ? 1 : 0;
					$select->where->equalTo('user.status',$status);
				}
				
				if(!empty($ssFilter['filter_group'])){
					$select->where->equalTo('user.group_id',$ssFilter['filter_group']);
				}
				
				if(!empty($ssFilter['filter_keyword_type']) && !empty($ssFilter['filter_keyword_value'])){
					if($ssFilter['filter_keyword_type'] != 'all') {
						$select->where->like('user.' . $ssFilter['filter_keyword_type'], '%'.$ssFilter['filter_keyword_value'].'%');
					}else{
						$select->where->NEST
									  ->like('username', '%'.$ssFilter['filter_keyword_value'].'%')
									  ->or
									  ->equalTo('user.id', $ssFilter['filter_keyword_value'])
									  ->or
									  ->like('email', '%'.$ssFilter['filter_keyword_value'].'%')
									  ->UNNEST;
					}
				}
			});
			
		}
		
		if($options['task'] == 'list-avatar') {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->columns(array('avatar'))
					   ->where->in('id', $arrParam);
			})->toArray();
		}
		
		return $result;
	}
	
	public function changeStatus($arrParam = null, $options = null){
		if($options['task'] == 'change-status') {
			if($arrParam['status_id'] > 0){
				$data 	= array('status' => ($arrParam['status_value'] == 1) ? 0 : 1);
				$where	= array('id' => $arrParam['status_id']);
				$this->tableGateway->update($data, $where);
				return true;
			}
		}

		if($options['task'] == 'change-multi-status') {
			if(!empty($arrParam['cid'])){
				$data 	= array('status' => $arrParam['status_value']);
				$cid	= implode(',', $arrParam['cid']);
				$where	= array('id IN ('.$cid.')');
				$this->tableGateway->update($data, $where);
				return true;
			}
		}
		
		return false;
	}
	
	public function getItem($arrParam = null, $options = null){
	
		if($options == null) {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
					$select->columns(array('id', 'username', 'email', 'sign','group_id', 'fullname','ordering', 'avatar','status'));
					$select->where->equalTo('id', $arrParam['id']);
			})->current();
		}
	
		return $result;
	}
	
	public function ordering($arrParam = null, $options = null){
	
		if($options == null) {
			if(!empty($arrParam['cid'])){
				foreach ($arrParam['cid'] as $id) {
					$data 	= array('ordering' => $arrParam['ordering'][$id]);
					$where	= array('id' => $id);
					$this->tableGateway->update($data, $where);
				}
				return true;
			}
		}
		
		return false;
	
	}
	
	public function deleteItem($arrParam = null, $options = null){
	
		if($options['task'] == 'multi-delete') {
			if(!empty($arrParam['cid'])){
				$items	= $this->listItem($arrParam['cid'], array('task' => 'list-avatar' ));
				$imgObj		= new Image();
				foreach ($items as $item) {
					if(!empty($item['avatar'])) $imgObj->removeImage($item['avatar'], array('task' => 'user-avatar'));
				}
				
				$where = new Where();
				$where->in('id', $arrParam['cid']);
				$this->tableGateway->delete($where);

				return true;
			}
		}
		return false;
	}
	
	public function saveItem($arrParam = null, $options = null){

		if($options['task'] == 'add-item') {
			$data	= array(
				'username'	=> $arrParam['username'],		
				'email'		=> $arrParam['email'],		
				'password'	=> md5($arrParam['password']),		
				'fullname'	=> $arrParam['fullname'],		
				'group_id'	=> $arrParam['group'],		
				'ordering'	=> $arrParam['ordering'],		
				'status'	=> ($arrParam['status'] == 'active') ? 1 : 0,		
				'created'	=> date('Y-m-d H:i:s'),		
			);

			if(!empty($arrParam['file']['tmp_name'])){
				$imageObj 		= new Image();
				$data['avatar']	= $imageObj->upload('file', array('task' => 'user-avatar'));
			}
			
			if(!empty($arrParam['sign'])){
				$config		= array(
						array('HTML.AllowedElements', 'p,s,u,em,strong,span'),
						array('HTML.AllowedAttributes', 'style'),
				);
				 
				$filter			= new \Zendvn\Filter\Purifier($config);
				$data['sign']	= $filter->filter($arrParam['sign']);
			}
			
			$this->tableGateway->insert($data);
			return $this->tableGateway->getLastInsertValue();
		}
		if($options['task'] == 'edit-item') {
			$data	= array(
				'username'	=> $arrParam['username'],		
				'email'		=> $arrParam['email'],			
				'fullname'	=> $arrParam['fullname'],		
				'group_id'	=> $arrParam['group'],		
				'ordering'	=> $arrParam['ordering'],		
				'status'	=> ($arrParam['status'] == 'active') ? 1 : 0,		
				'modified'	=> date('Y-m-d H:i:s'),		
			);
			
			if(!empty($arrParam['password']))  $data['password']	= md5($arrParam['password']);
				
			if(!empty($arrParam['sign'])){
				$config		= array(
						array('HTML.AllowedElements', 'p,s,u,em,strong,span'),
						array('HTML.AllowedAttributes', 'style'),
				);
					
				$filter			= new \Zendvn\Filter\Purifier($config);
				$data['sign']	= $filter->filter($arrParam['sign']);
			}
			
			if(!empty($arrParam['file']['tmp_name'])){
				$imageObj 		= new Image();
				$data['avatar']	= $imageObj->upload('file', array('task' => 'user-avatar'));
				$imageObj->removeImage($arrParam['avatar'],array('task' => 'user-avatar'));
			}
			// AbcD123@#$
			$this->tableGateway->update($data, array('id' => $arrParam['id']));
			return $arrParam['id'];
		}
	}
}
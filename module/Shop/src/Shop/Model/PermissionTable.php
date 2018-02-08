<?php
namespace Shop\Model;

use Zend\Db\Sql\Expression;

use Zend\Json\Json;

use Zend\Db\Sql\Where;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class PermissionTable extends AbstractTableGateway {
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway	= $tableGateway;
	}
	
	public function getItem($arrParam = null, $options = null){
	
		if($options['task'] == 'store-permission-info') {
			if(empty($arrParam->permission_id)) return 'full';
			
			$permissions	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$permissionID	= Json::decode($arrParam->permission_id);
				$select->columns(array('permission' => new Expression('CONCAT(module,"||",controller,"||",action)')))
					   ->where->in('id', $permissionID);
			});
			
			foreach($permissions as $value) $result[]	= $value->permission;
		}
	
		return $result;
	}
	
}
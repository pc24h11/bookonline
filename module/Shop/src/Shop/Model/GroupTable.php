<?php
namespace Shop\Model;

use Zend\Db\Sql\Where;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class GroupTable extends AbstractTableGateway {
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway	= $tableGateway;
	}
	
	public function getItem($arrParam = null, $options = null){
	
		
		if($options['task'] == 'store-group-info') {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->columns(array('id', 'name', 'group_acp', 'permission_id'))
					   ->where->equalTo('id', $arrParam['id']);
			})->current();
		}
		
		return $result;
	}
	
}
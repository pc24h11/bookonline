<?php
namespace Shop\Model;

use Zend\Db\Sql\Select;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class SliderTable extends AbstractTableGateway {
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway	= $tableGateway;
	}
	
	public function listItem($arrParam = null, $options = null){
	
		if($options['task'] == 'slider-frontend') {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
					$select->columns(array('id', 'name', 'picture', 'price', 'description', 'book_id'))
						   ->limit(3)
						   ->order('ordering ASC')
						   ->where->equalTo('status', 1)
					;
			});
		}
		
		return $result;
	}
	
}
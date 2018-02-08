<?php
namespace Shop\Model;

use Admin\Model\NestedTable;

use Zend\Db\Sql\Where;

use Zendvn\File\Image;

use PHPImageWorkshop\ImageWorkshop;

use Zendvn\File\Upload;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class CategoryTable extends NestedTable {
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway	= $tableGateway;
	}
	
	public function getItem($arrParam = null, $options = null){
	
		if($options['task'] == 'category-frontend') {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->columns(array('id', 'name', 'description', 'left', 'right'))
						->where->equalTo('id', $arrParam['id']);
				;
			})->current();
		}
	
		return $result;
	}
	
	public function listItem($arrParam = null, $options = null){
		
		if($options['task'] == 'category-frontend') {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				
				$select->columns(array(
							'id', 'name', 'level', 'right', 'left'
						))
						->order(array('left ASC'))
						->where->lessThanOrEqualTo('level', 3)
						->where->greaterThan('level', 0);
				;
			});
		}
		
		if($options['task'] == 'list-breadcrumb') {
			
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->columns(array('id','name','level', 'parent'))
						->order('left ASC')
						->where->greaterThan('level', 0)
						->where->lessThanOrEqualTo('left', $arrParam->left)
						->where->greaterThanOrEqualTo('right', $arrParam->right)
				;
			});
		}
		
		if($options['task'] == 'list-branch') {
			$items	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->columns(array('id','name','level', 'parent'))
					   ->order('left ASC')
					   ->where->greaterThan('level', 0)
					   ->where->between('left',$arrParam->left,$arrParam->right)
				;
			});
			foreach ($items as $item){
				$result[]	= $item->id;
				
			}
					
		}
		
		return $result;
	}
	
}
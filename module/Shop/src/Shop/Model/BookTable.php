<?php
namespace Shop\Model;

use Zend\Session\Container;

use Zend\Db\Sql\Expression;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class BookTable extends AbstractTableGateway {
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway	= $tableGateway;
	}
	
	public function countItem($arrParam = null, $options = null){
		if($options['task'] == 'list-item') {
				
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->where->in('category_id', $arrParam)
					   ->where->equalTo('status', 1);
			})->count();
				
		}
		return $result;
	}
	
	public function getItem($arrParam = null, $options = null){
	
		if($options['task'] == 'special-book') {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
					$select->columns(array('id', 'name', 'price', 'sale_off', 'picture'))
					       ->limit(1)
					       ->order(new Expression('RAND()'))
					       ->where->equalTo('book.status', 1)
					       ->where->equalTo('book.special', 1);
			})->current();
		}
		
		if($options['task'] == 'book-info') {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->columns(array('id', 'name', 'price', 'sale_off', 'picture', 'description', 'category_id'))
						->join(
								array('c' => 'category'),
								'book.category_id = c.id',
								array('category_name' => 'name'),
								$select::JOIN_LEFT
						)
					   ->where->equalTo('book.id', $arrParam['id']);
			})->current();
		}
		
		if($options['task'] == 'book-popup') {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->columns(array('id', 'name', 'price', 'sale_off', 'picture', 'description'))
						->join(
								array('c' => 'category'),
								'book.category_id = c.id',
								array('category_name' => 'name'),
								$select::JOIN_LEFT
						)
						->where->equalTo('book.id', $arrParam['id']);
			})->current();
		}
	
		return $result;
	}
	
	public function listItem($arrParam = null, $options = null){
	
		if($options['task'] == 'new-book') {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->columns(array('id', 'name', 'price', 'sale_off', 'picture'))
						->join(
								array('c' => 'category'),
								'book.category_id = c.id',
								array('category_name' => 'name'),
								$select::JOIN_LEFT
						)
						->limit(6)
						->order('book.id DESC')
						->where->equalTo('book.status', 1);
			});
		}
		
		if($options['task'] == 'book-in-category') {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$paginator	= $arrParam['paginator'];
				$filter		= $arrParam['filter'];
				
				$select->columns(array('id', 'name', 'price', 'sale_off', 'picture', 'description'))
						->join(
								array('c' => 'category'),
								'book.category_id = c.id',
								array('category_name' => 'name'),
								$select::JOIN_LEFT
						)
					   ->limit($paginator['itemCountPerPage'])
					   ->offset(($paginator['currentPageNumber'] - 1) * $paginator['itemCountPerPage'])
					   ->where->in('book.category_id', $arrParam['data']['catIDs'])
					   ->where->equalTo('book.status', 1);
				
				if(!empty($filter['order']) && !empty($filter['dir'])){
					$select->order(array($filter['order'] . ' ' . $filter['dir']));
				}
			});
		}
		
		if($options['task'] == 'book-in-category-related') {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->columns(array('id', 'name', 'price', 'sale_off', 'picture'))
						->limit(4)
						->join(
								array('c' => 'category'),
								'book.category_id = c.id',
								array('category_name' => 'name'),
								$select::JOIN_LEFT
						)
						->where->notEqualTo('book.id', $arrParam['book_id'])
						->where->in('book.category_id', $arrParam['catIDs'])
						->where->equalTo('book.status', 1);
			});
		}
		
		if($options['task'] == 'book-in-cart') {
			$cart		= new Container(BOOKONLINE_KEY . '_cart');
			$arrParam	= $cart->quantity;

			$result		= null;
			if(!empty($arrParam)){
				$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
					$bookIDs	= array_keys($arrParam);
					
					$select->columns(array('id', 'name', 'picture'))
							->join(
									array('c' => 'category'),
									'book.category_id = c.id',
									array('category_name' => 'name'),
									$select::JOIN_LEFT
							)
							->where->in('book.id', $bookIDs)
						    ->where->equalTo('book.status', 1);
				});
			}
		}
	
	
		return $result;
	}
	
}
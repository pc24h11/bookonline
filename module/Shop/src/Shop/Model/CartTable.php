<?php
namespace Shop\Model;

use Zend\Json\Json;

use Zendvn\System\Info;

use Zend\Db\Sql\Where;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class CartTable extends AbstractTableGateway {
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway	= $tableGateway;
	}
	
	public function saveItem($arrParam = null, $options = null){

		if($options['task'] == 'submit-cart') {

			$infoObj	= new Info();
			$username	= $infoObj->getUserInfo('username');
			$data	= array(
				'id'		=> $this->randomString(7),		
				'username'	=> $username,		
				'books'		=> Json::encode($arrParam['books']),
				'prices'	=> Json::encode($arrParam['prices']),
				'quantities'=> Json::encode($arrParam['quantities']),
				'names'		=> Json::encode($arrParam['names']),
				'pictures'	=> Json::encode($arrParam['pictures']),
				'status'	=> 0,
				'date'		=> date('Y-m-d H:i:s'),		
			);
			$this->tableGateway->insert($data);
			return $this->tableGateway->getLastInsertValue();
		}
	}
	
	public function listItem($arrParam = null, $options = null){
	
		if($options['task'] == 'view-history') {
			
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$info		= new Info();
				$username	= $info->getUserInfo('username');
				
				$select->columns(array('id', 'date', 'prices', 'quantities', 'books', 'names', 'pictures', 'status'))
					    ->order(array('date DESC'))
						->where->equalTo('username', $username);
			});
		}
	
		return $result;
	}
	
	private function randomString($length = 5){
	
		$arrCharacter = array_merge(range('a','z'), range(0,9));
		$arrCharacter = implode($arrCharacter, '');
		$arrCharacter = str_shuffle($arrCharacter);
	
		$result		= substr($arrCharacter, 0, $length);
		return $result;
	}
}
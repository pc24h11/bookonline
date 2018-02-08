<?php
namespace Block;
use Zend\View\Helper\AbstractHelper;

class BlkCategory extends AbstractHelper {
	
	protected $_data;
	
	public function __invoke(){
		require_once 'BlkCategory/default.phtml';
	}
	
	public function setData($table){
		$this->_data = $table->listItem(null, array('task' => 'category-frontend'));
		return $this->_data;
	}
}
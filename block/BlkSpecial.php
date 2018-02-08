<?php
namespace Block;
use Zend\View\Helper\AbstractHelper;

class BlkSpecial extends AbstractHelper {
	
	protected $_data;
	
	public function __invoke(){
		require_once 'BlkSpecial/default.phtml';
	}
	
	public function setData($table){
		$this->_data = $table->getItem(null, array('task' => 'special-book'));
		return $this->_data;
	}
}
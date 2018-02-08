<?php
namespace Block;
use Zend\View\Helper\AbstractHelper;

class BlkNewBook extends AbstractHelper {
	
	protected $_data;
	
	public function __invoke(){
		require_once 'BlkNewBook/default.phtml';
	}
	
	public function setData($table){
		$this->_data = $table->listItem(null, array('task' => 'new-book'));
		return $this->_data;
	}
}
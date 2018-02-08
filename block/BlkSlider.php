<?php
namespace Block;
use Zend\View\Helper\AbstractHelper;

class BlkSlider extends AbstractHelper {
	
	protected $_data;
	
	public function __invoke(){
		require_once 'BlkSlider/default.phtml';
	}
	
	public function setData($table){
		$this->_data = $table->listItem(null, array('task' => 'slider-frontend'));
		return $this->_data;
	}
}
<?php
namespace Block;
use Zend\View\Helper\AbstractHelper;

class BlkFacebook extends AbstractHelper {
	
	public function __invoke(){
		require_once 'BlkFacebook/default.phtml';
	}
	
}
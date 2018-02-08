<?php
namespace Block;
use Zend\View\Helper\AbstractHelper;

class BlkUserLink extends AbstractHelper {
	
	public function __invoke(){
		require_once 'BlkUserLink/default.phtml';
	}
	
}
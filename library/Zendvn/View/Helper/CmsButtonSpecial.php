<?php
namespace Zendvn\View\Helper;
use Zend\View\Helper\AbstractHelper;

class CmsButtonSpecial extends AbstractHelper {
	
	public function __invoke($id, $special, $options = null){
	
		$classSpecial	= ($special == 1) ? 'primary' : 'default';
		
		return sprintf('<a href="#" onclick="javascript:changeSpecial(\'%s\',\'%s\')" class="label label-%s"><i class="fa fa-star"></i></a>', 
						$id, $special, $classSpecial);
	}
}
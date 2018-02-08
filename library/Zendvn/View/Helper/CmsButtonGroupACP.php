<?php
namespace Zendvn\View\Helper;
use Zend\View\Helper\AbstractHelper;

class CmsButtonGroupACP extends AbstractHelper {
	
	public function __invoke($id, $groupACP, $options = null){
	
		$classSpecial	= ($groupACP == 1) ? 'primary' : 'default';
		
		return sprintf('<a href="#" onclick="javascript:changeGroupACP(\'%s\',\'%s\')" class="label label-%s"><i class="fa fa-star"></i></a>', 
						$id, $groupACP, $classSpecial);
	}
}
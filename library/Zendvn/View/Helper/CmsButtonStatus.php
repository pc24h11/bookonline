<?php
namespace Zendvn\View\Helper;
use Zend\View\Helper\AbstractHelper;

class CmsButtonStatus extends AbstractHelper {
	
	public function __invoke($id, $status, $options = null){
	
		$classStatus	= ($status == 1) ? 'success' : 'default';
		
		return sprintf('<a href="#" onclick="javascript:changeStatus(\'%s\',\'%s\')" class="label label-%s"><i class="fa fa-check"></i></a>', 
						$id, $status, $classStatus);
	}
}
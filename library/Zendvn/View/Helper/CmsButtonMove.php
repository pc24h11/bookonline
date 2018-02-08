<?php
namespace Zendvn\View\Helper;
use Zend\View\Helper\AbstractHelper;

class CmsButtonMove extends AbstractHelper {
	
	public function __invoke($id, $type = 'up', $ssFilter, $valChild, $valParent, $options = null){
	
		if($ssFilter['order_by'] == 'left' && $ssFilter['order'] == 'ASC') {
			
			$icon = 'fa-arrow-up';
			if($type != 'up'){
				$type = 'down';
				$icon = 'fa-arrow-down';
			}
			
			if($valChild == $valParent) return '<span>&nbsp;</span>';
			
			return sprintf('<span><a href="#" onclick="javascript:moveNode(\'%s\',\'%s\')" class="label label-primary"><i class="fa fa-fw %s"></i></a></span>', 
						$id, $type, $icon);
		}
		
		return null;
		
	}
}
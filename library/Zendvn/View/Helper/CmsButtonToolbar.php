<?php
namespace Zendvn\View\Helper;
use Zend\View\Helper\AbstractHelper;

class CmsButtonToolbar extends AbstractHelper {
	
	public function __invoke($name, $icon, $type, $showTotal = null, $link = null){
		$showTotal	= !empty($showTotal) ? $showTotal : 'no';
		$type		= !empty($type) ? $type : 'default';
		$link		= !empty($link) ? $link : '#';
		
		return sprintf('<a data-show-item="%s" data-type="%s" class="btn btn-app" href="%s">
							<i class="fa %s"></i>%s
						</a>', $showTotal, $type, $link, $icon, $name); 
	}
}
<?php
namespace Zendvn\View\Helper;
use Zend\View\Helper\AbstractHelper;

class CmsChangeDisplay extends AbstractHelper {
	
	public function __invoke($link, $type, $icon, $display, $options = null){
		
		$class	= ($display == $type) ? 'display-active' : '';
		
		$xhtml	= sprintf('<a class="change-display %s" href="%s" data-type="%s"><i class="fa %s"></i></a>',
								$class, $link, $type, $icon
							);
		return $xhtml;
	}
}
<?php
namespace Zendvn\View\Helper\Url;
use Zend\View\Helper\AbstractHelper;

class LinkHistory extends AbstractHelper {
	
	public function __invoke($options = null){
		$urlHelper	= $this->getView()->plugin('url');
		
		if(URL_FRIENDLY == true){		
			return $urlHelper('routeHistory');
		}
		
		return $urlHelper('shopRoute/default', array(
			'controller'	=> 'user',		
			'action'		=> 'history',		
		));
	}
}
<?php
namespace Zendvn\View\Helper\Url;
use Zend\View\Helper\AbstractHelper;

class LinkCart extends AbstractHelper {
	
	public function __invoke($options = null){
		$urlHelper	= $this->getView()->plugin('url');
		
		if(URL_FRIENDLY == true){		
			return $urlHelper('routeCart');
		}
		
		return $urlHelper('shopRoute/default', array(
			'controller'	=> 'user',		
			'action'		=> 'cart',		
		));
	}
}
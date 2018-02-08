<?php
namespace Zendvn\View\Helper\Url;
use Zend\View\Helper\AbstractHelper;

class LinkRegister extends AbstractHelper {
	
	public function __invoke($options = null){
		$urlHelper	= $this->getView()->plugin('url');
		
		if(URL_FRIENDLY == true){		
			return $urlHelper('routeRegister');
		}
		
		return $urlHelper('shopRoute/default', array(
			'controller'	=> 'index',		
			'action'		=> 'register',		
		));
	}
}
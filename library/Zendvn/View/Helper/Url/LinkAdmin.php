<?php
namespace Zendvn\View\Helper\Url;
use Zend\View\Helper\AbstractHelper;

class LinkAdmin extends AbstractHelper {
	
	public function __invoke($options = null){
		$urlHelper	= $this->getView()->plugin('url');
		
		return $urlHelper('adminRoute/default', array(
			'controller'	=> 'index',		
			'action'		=> 'index',		
		));
	}
}
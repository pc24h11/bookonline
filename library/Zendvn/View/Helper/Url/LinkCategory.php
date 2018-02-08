<?php
namespace Zendvn\View\Helper\Url;
use Zendvn\Filter\CreateURLFriendly;

use Zend\View\Helper\AbstractHelper;

class LinkCategory extends AbstractHelper {
	
	public function __invoke($id, $name, $options = null){
		$urlHelper	= $this->getView()->plugin('url');
		$filter		= new CreateURLFriendly();
		
		if(URL_FRIENDLY == true){		
			return	$urlHelper('routeCategory', array(
				'name' 	=> $filter->filter($name), 
				'id' 	=> $id
			));
		}
		
		return $urlHelper('shopRoute/default', array(
				'controller'=> 'category', 
				'action' 	=> 'index', 
				'id' 		=> $id));
		
	}
}
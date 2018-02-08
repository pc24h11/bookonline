<?php
namespace Zendvn\View\Helper\Url;
use Zendvn\Filter\CreateURLFriendly;

use Zend\View\Helper\AbstractHelper;

class LinkListBook extends AbstractHelper {
	
	public function __invoke($id, $name, $options = null){
		$urlHelper	= $this->getView()->plugin('url');
		$filter		= new CreateURLFriendly();
		
		if(URL_FRIENDLY == true){		
			return	$urlHelper('routeCategory/filter', array(
				'name' 		=> $filter->filter($name), 
				'id' 		=> $id,
				'display' 	=> $options['display'],
				'page' 		=> $options['page'],
				'order' 	=> $options['order'],
				'dir' 		=> $options['dir'],
				'limit' 	=> $options['limit'],
			));
		}
		
		return $urlHelper('shopRoute/category', array(
				'id' 		=> $id, 
				'display' 	=> $options['display'], 
				'page' 		=> $options['page'], 
				'order' 	=> $options['order'], 
				'dir' 		=> $options['dir'], 
				'limit' 	=> $options['limit']
		));
		
	}
}
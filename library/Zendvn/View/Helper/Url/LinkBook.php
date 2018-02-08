<?php
namespace Zendvn\View\Helper\Url;
use Zendvn\Filter\CreateURLFriendly;

use Zend\View\Helper\AbstractHelper;

class LinkBook extends AbstractHelper {
	
	public function __invoke($id, $name, $categoryName, $options = null){
		$urlHelper	= $this->getView()->plugin('url');
		$filter		= new CreateURLFriendly();
		
		if(URL_FRIENDLY == true){		
			return	$urlHelper('routeBook', array(
				'category_name' => $filter->filter($categoryName), 
				'name' 			=> $filter->filter($name), 
				'id' 			=> $id
			));
		}
		
		return $urlHelper('shopRoute/default', array(
				'controller'=> 'book', 
				'action' 	=> 'index', 
				'id' 		=> $id
		));
		
	}
}
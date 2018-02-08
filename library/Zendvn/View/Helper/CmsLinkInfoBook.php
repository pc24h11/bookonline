<?php
namespace Zendvn\View\Helper;
use Zend\View\Helper\AbstractHelper;

class CmsLinkInfoBook extends AbstractHelper {
	
	public function __invoke($bookID, $options = null){
		
		$urlPlugin	= $this->getView()->plugin('url');
		
		return $urlPlugin( 'shopRoute/default', array (
				'controller' 	=> 'book',
				'action' 		=> 'index',
				'id' 			=> $bookID,
		));
	}
}
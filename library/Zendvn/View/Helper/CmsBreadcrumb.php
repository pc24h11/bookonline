<?php
namespace Zendvn\View\Helper;
use Zend\View\Helper\AbstractHelper;

class CmsBreadcrumb extends AbstractHelper {
	
	public function __invoke($items, $options = null){
		$urlHelper		= $this->getView()->plugin('url');
		$linkHome		= $this->getView()->plugin('linkHome');
		$linkCategory	= $this->getView()->plugin('linkCategory');
		
		
		$result	= sprintf('<a href="%s">Home</a>&nbsp;&nbsp;&raquo&nbsp;&nbsp;', $linkHome());
		$total	= $items->count();
		if(!empty($items)){
			$i = 1;
			foreach ($items as $item) {
				$link	= $linkCategory($item->id, $item->name);
				
				if($i == $total){
					$result			.= sprintf('<a href="#">%s</a>', $item->name);
				}else{
					$result			.= sprintf('<a href="%s">%s</a>&nbsp;&nbsp;&raquo;&nbsp;&nbsp;', $link, $item->name);
				}
				$i++;
			}
			
		}
		return $result;
	}
}
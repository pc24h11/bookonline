<?php
namespace Zendvn\View\Helper;
use Zend\View\Helper\AbstractHelper;

class CmsSummary extends AbstractHelper {
	
	public function __invoke($str, $limit=100, $options = null){
		if (strlen ($str) > $limit) {
			$str = substr ($str, 0, $limit - 3);
			return (substr ($str, 0, strrpos ($str, ' ')) . '...');
		}
		return trim($str);
	}
}
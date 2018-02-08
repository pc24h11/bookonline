<?php
namespace Zendvn\View\Helper;
use Zend\Json\Json;

use Zend\View\Helper\AbstractHelper;

class CmsPriceReal extends AbstractHelper {
	
	public function __invoke($price, $saleOff, $options = null){
		
		if(!empty($saleOff)){
			$priceObj		= Json::decode($saleOff);
		
			if($priceObj->type == 'percent') {
				$price	= $price * (100 - $priceObj->value)/100;
			}else if($price->type == 'number'){
				$price	= $price - $priceObj->value;
			}
		}
		
		return $price;
	}
}
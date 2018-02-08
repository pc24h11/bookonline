<?php
namespace Zendvn\View\Helper;
use Zend\Json\Json;

use Zend\View\Helper\AbstractHelper;

class CmsInfoPrice extends AbstractHelper {
	
	public function __invoke($priceReal, $saleOff, $options = null){
		
		$strPrice	= number_format($priceReal,0);
		if(!empty($saleOff)){
			$price		= Json::decode($saleOff);
		
			if($price->type == 'percent') {
				$priceValue	= $priceReal * (100 - $price->value)/100;
			}else if($price->type == 'number'){
				$priceValue	= $priceReal - $price->value;
			}else{
				return sprintf('<span class="price-new">%s</span>', $strPrice);
			}
		
			if($options == null){
				$strPrice	= sprintf('<p class="price">%s</p><small class="badge bg-blue">%s</small>',
											number_format($priceReal,0),
											number_format($priceValue,0));
			}
			
			if($options['task'] == 'price-frontend'){
				$strPrice	= sprintf('<span class="price-new">%s</span><span class="price-old">%s</span>',
											number_format($priceValue,0),
											number_format($priceReal,0));
			}
			
		}
		
		return $strPrice;
	}
}
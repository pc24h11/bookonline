<?php
namespace Admin\Form;

use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;

use Zend\Validator\Regex;

use Zend\InputFilter\InputFilter;

class CategoryFilter extends InputFilter {
	
	public function __construct($options = null){
		
		$exclude = null;
		if(!empty($options['id'])){
			$exclude	= array(
					'field'	=> 'id',
					'value'	=> 	$options['id']	
			);
		}
		
		// Name
		$this->add(array(
				'name'		=> 'name',
				'required'	=> true,
				'validators'	=> array(
						array(
								'name'		=> 'NotEmpty',
								'break_chain_on_failure'	=> true
						),
						array(
								'name'		=> 'StringLength',
								'options'	=> array('min' => 4, 'max' => 200),
								'break_chain_on_failure'	=> true
						),
						array(
								'name'		=> 'DbNoRecordExists',
								'options'	=> array(
										'table'		=> TABLE_CATEGORY,
										'field'		=> 'name',
										'adapter'	=> GlobalAdapterFeature::getStaticAdapter(),
										'exclude'	=> $exclude
								),
								'break_chain_on_failure'	=> true
						),
				)
		));
		
		
		// Group
// 		$this->add(array(
// 				'name'		=> 'group',
// 				'required'	=> true,
// 		));
		
		// Status
		$this->add(array(
				'name'		=> 'status',
				'required'	=> true,
		));
		
	}
}
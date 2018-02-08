<?php
namespace Admin\Form;

use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;

use Zend\Validator\Regex;

use Zend\InputFilter\InputFilter;

class SliderFilter extends InputFilter {
	
	public function __construct($options = null){
		
		$requireUpload	= true;
		if(!empty($options['id'])){
			$requireUpload	= false;
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
				)
		));
		
		// Description
		$this->add(array(
				'name'		=> 'description',
				'required'	=> true,
				'validators'	=> array(
						array(
								'name'		=> 'NotEmpty',
								'break_chain_on_failure'	=> true
						),
						array(
								'name'		=> 'StringLength',
								'options'	=> array('min' => 100, 'max' => 500),
								'break_chain_on_failure'	=> true
						),
				)
		));
		
		// File
		$this->add(array(
				'name'		=> 'file',
				'required'	=> $requireUpload,
				'validators'	=> array(
						array(
								'name'		=> 'FileSize',
								'options'	=> array(
										'min'	=> '10Kb',
										'max'	=> '5MB',
								),
								'break_chain_on_failure'	=> true
						),
						array(
								'name'		=> 'FileImageSize',
								'options'	=> array(
										'minwidth'		=> 870,
										'maxwidth'		=> 870,
										'minheight'		=> 370,
										'maxheight'		=> 370,
								),
								'break_chain_on_failure'	=> true
						),
						array(
								'name'		=> 'FileExtension',
								'options'	=> array(
										'extension'		=> array('jpg', 'png'),
								),
								'break_chain_on_failure'	=> true
						),
				)
		));
		
		// Ordering
		$this->add(array(
				'name'		=> 'ordering',
				'required'	=> true,
				'validators'	=> array(
						array(
								'name'		=> 'Digits',
								'break_chain_on_failure'	=> true
						),
					
				)
		));
		
		// Price
		$this->add(array(
				'name'		=> 'price',
				'required'	=> true,
				'validators'	=> array(
						array(
								'name'		=> 'Digits',
								'break_chain_on_failure'	=> true
						),
						array(
								'name'		=> 'Between',
								'options'	=> array(
										'min'		=> 10000,
										'max'		=> 1000000,
								),
								'break_chain_on_failure'	=> true
						),
				)
		));
		
		// Book ID
		$this->add(array(
				'name'		=> 'book_id',
				'required'	=> true,
		));
		
		// Status
		$this->add(array(
				'name'		=> 'status',
				'required'	=> true,
		));
		
	}
}
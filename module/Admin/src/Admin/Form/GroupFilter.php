<?php
namespace Admin\Form;

use Zend\InputFilter\InputFilter;

class GroupFilter extends InputFilter {
	
	public function __construct(){
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
		
		// Status
		$this->add(array(
				'name'		=> 'status',
				'required'	=> true,
		));
		
	}
}
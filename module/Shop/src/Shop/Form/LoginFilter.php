<?php
namespace Shop\Form;

use Zend\InputFilter\InputFilter;

class LoginFilter extends InputFilter {
	
	public function __construct(){
		
		// EMAIL
		$this->add(array(
				'name'		=> 'email',
				'required'	=> true,
				'validators'	=> array(
						array(
								'name'		=> 'NotEmpty',
								'break_chain_on_failure'	=> true
						),
						array(
								'name'		=> 'EmailAddress',
						),
				)
		));
		
		// PASSWORD
		$this->add(array(
				'name'		=> 'password',
				'required'	=> true,
				'validators'	=> array(
						array(
								'name'		=> 'NotEmpty',
								'break_chain_on_failure'	=> true
						),
						array(
								'name'		=> 'StringLength',
								'options'	=> array(
										'min'	=> 5,
										'max'	=> 18,
								),
								'break_chain_on_failure'	=> true
						),
				)
		));
	}
}
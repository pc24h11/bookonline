<?php
namespace Shop\Form;
use \Zend\Form\Form as Form;
use Zend\Form\Element as Element;

class Login extends Form {
	
	public function __construct($name = null){
		parent::__construct();
		
		
		// FORM Attribute
		$this->setAttributes(array(
				'action'	=> '',
				'method'	=> 'POST',
				'class'		=> 'form-horizontal',
				'name'		=> 'shopForm',
				'id'		=> 'shopForm',
				'enctype'	=> 'multipart/form-data',
		));
		
		// Email
		$this->add(array(
				'name'			=> 'email',
				'type'			=> 'Email',
				'attributes'	=> array(
						'class'			=> 'q1 margen-bottom',
						'id'			=> 'email',
				),
				'options'		=> array(
						'label'				=> 'E-Mail Address:',
						'label_attributes'	=> array(
								'class'		=> 'padd-form control-label col-sm-5',
						)
				),
		));
		
		// Password
		$this->add(array(
				'name'			=> 'password',
				'type'			=> 'Password',
				'attributes'	=> array(
						'class'			=> 'q1 margen-bottom',
						'id'			=> 'inputPassword3',
				),
				'options'		=> array(
						'label'				=> 'Password',
						'label_attributes'	=> array(
								'class'		=> 'padd-form control-label col-sm-5',
						)
				),
		));
	}
}
<?php
namespace Shop\Form;

use \Zend\Form\Form as Form;
use Zend\Form\Element as Element;

class Register extends Form {
	
	public function __construct(){
		parent::__construct();
		
		// FORM Attribute
		$this->setAttributes(array(
				'action'	=> '#',
				'method'	=> 'POST',
				'class'		=> 'form-horizontal',
				'role'		=> 'form',
				'name'		=> 'shopForm',
				'id'		=> 'shopForm',
				'style'		=> 'padding-top: 20px;',
				'enctype'	=> 'multipart/form-data'
		));
		
		
		// Username 
		$this->add(array(
				'name'			=> 'username',
				'type'			=> 'Text',
				'attributes'	=> array(
						'class'			=> 'q1',
						'id'			=> 'username',
						'placeholder'	=> 'Enter username',
				),
				'options'		=> array(
						'label'				=> 'Username',
						'label_attributes'	=> array(
								'for'		=> 'username',
								'class'		=> 'control-label col-sm-4',
						)
				),
		));
		
		// Email
		$this->add(array(
				'name'			=> 'email',
				'type'			=> 'Email',
				'attributes'	=> array(
						'class'			=> 'q1',
						'id'			=> 'email',
						'placeholder'	=> 'Enter email',
				),
				'options'		=> array(
						'label'				=> 'Email',
						'label_attributes'	=> array(
								'for'		=> 'email',
								'class'		=> 'control-label col-sm-4',
						)
				),
		));
		
		// Fullname
		$this->add(array(
				'name'			=> 'fullname',
				'type'			=> 'Text',
				'attributes'	=> array(
						'class'			=> 'q1',
						'id'			=> 'fullname',
						'placeholder'	=> 'Enter fullname',
				),
				'options'		=> array(
						'label'				=> 'Fullname',
						'label_attributes'	=> array(
								'for'		=> 'fullname',
								'class'		=> 'control-label col-sm-4',
						)
				),
		));
		
		// Password
		$this->add(array(
				'name'			=> 'password',
				'type'			=> 'Password',
				'attributes'	=> array(
						'class'			=> 'q1',
						'id'			=> 'password',
						'placeholder'	=> 'Enter password',
				),
				'options'		=> array(
						'label'				=> 'Password',
						'label_attributes'	=> array(
								'for'		=> 'password',
								'class'		=> 'control-label col-sm-4',
						)
				),
		));
		
	}
}
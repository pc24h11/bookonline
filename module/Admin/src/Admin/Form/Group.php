<?php
namespace Admin\Form;
use \Zend\Form\Form as Form;
use Zend\Form\Element as Element;

class Group extends Form {
	
	public function __construct($name = null){
		parent::__construct();
		
		// FORM Attribute
		$this->setAttributes(array(
				'action'	=> '#',
				'method'	=> 'POST',
				'class'		=> 'form-horizontal',
				'role'		=> 'form',
				'name'		=> 'adminForm',
				'id'		=> 'adminForm',
				'style'		=> 'padding-top: 20px;',
		));
		
		// ID
		$this->add(array(
				'name' 			=> 'id',
				'attributes' 	=> array(
						'type'  => 'hidden',
				),
		));
		
		// Action
		$this->add(array(
				'name' 			=> 'action',
				'attributes' 	=> array(
						'type'  => 'hidden',
				),
		));
		
		// Name 
		$this->add(array(
				'name'			=> 'name',
				'type'			=> 'Text',
				'attributes'	=> array(
						'class'			=> 'form-control',
						'id'			=> 'name',
						'placeholder'	=> 'Enter name',
				),
				'options'		=> array(
						'label'				=> 'Name',
						'label_attributes'	=> array(
								'for'		=> 'name',
								'class'		=> 'col-xs-3 control-label',
						)
				),
		));
		
		// Ordering
		$this->add(array(
				'name'			=> 'ordering',
				'type'			=> 'Text',
				'attributes'	=> array(
						'class'			=> 'form-control',
						'id'			=> 'ordering',
						'placeholder'	=> 'Enter ordering',
				),
				'options'		=> array(
						'label'				=> 'Ordering',
						'label_attributes'	=> array(
								'for'		=> 'ordering',
								'class'		=> 'col-xs-3 control-label',
						)
				),
		));
		
		// Status
		$this->add(array(
				'name'			=> 'status',
				'type'			=> 'Select',
				'options'		=> array(
						'empty_option'	=> '-- Select status --',
						'value_options'	=> array(
								'active'	=> 'Active',
								'inactive'	=> 'InActive',
						),
						'label'	=> 'Status',
						'label_attributes'	=> array(
								'for'		=> 'status',
								'class'		=> 'col-xs-3 control-label',
						),
				),
				'attributes'	=> array(
						'class'			=> 'form-control',
				),
		));
		
	}
	
	public function showMessage(){
		$messages = $this->getMessages();
		
		if(empty($messages)) return false;
		
		$xhtml = '<div class="callout callout-danger">';
		foreach($messages as $key => $msg){
			$xhtml .= sprintf('<p><b>%s:</b> %s</p>',ucfirst($key), current($msg));
		}
		$xhtml .= '</div>';
		return $xhtml;
	}
	
	
	
	
	
	
	
}
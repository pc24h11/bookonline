<?php
namespace Admin\Form;
use Admin\Model\CategoryTable;
use \Zend\Form\Form as Form;
use Zend\Form\Element as Element;

class Category extends Form {
	
	public function __construct(CategoryTable $categoryTable){
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
				'enctype'	=> 'multipart/form-data'
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
		
		// Description
		$this->add(array(
				'name'			=> 'description',
				'type'			=> 'Textarea',
				'attributes'	=> array(
						'class'			=> 'form-control',
						'id'			=> 'description',
				),
				'options'		=> array(
						'label'				=> 'Description',
						'label_attributes'	=> array(
								'for'		=> 'description',
								'class'		=> 'col-xs-3 control-label',
						)
				),
		));
		
		
		// Parent
		$this->add(array(
				'name'			=> 'parent',
				'type'			=> 'Select',
				'options'		=> array(
						'empty_option'	=> '-- Select category --',
						'value_options'	=> $categoryTable->itemInSelectbox(null, array('task' => 'form-category')),
						'label'	=> 'Category',
						'label_attributes'	=> array(
								'for'		=> 'parent',
								'class'		=> 'col-xs-3 control-label',
						),
				),
				'attributes'	=> array(
						'class'			=> 'form-control',
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
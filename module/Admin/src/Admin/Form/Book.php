<?php
namespace Admin\Form;
use Admin\Model\CategoryTable;
use \Zend\Form\Form as Form;
use Zend\Form\Element as Element;

class Book extends Form {
	
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
		
		// Picture
		$this->add(array(
				'name' 			=> 'picture',
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
		
		// File picture
		$this->add(array(
				'name'			=> 'file',
				'type'			=> 'File',
				'attributes'	=> array(
						'class'			=> 'form-control',
						'id'			=> 'file',
				),
				'options'		=> array(
						'label'				=> 'Picture',
						'label_attributes'	=> array(
								'for'		=> 'file',
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
		
		// Price
		$this->add(array(
				'name'			=> 'price',
				'type'			=> 'Text',
				'attributes'	=> array(
						'class'			=> 'form-control',
						'id'			=> 'price',
						'placeholder'	=> 'Enter ordering',
				),
				'options'		=> array(
						'label'				=> 'Price',
						'label_attributes'	=> array(
								'for'		=> 'price',
								'class'		=> 'col-xs-3 control-label',
						)
				),
		));
		
		// Category
		$this->add(array(
				'name'			=> 'category_id',
				'type'			=> 'Select',
				'options'		=> array(
						'empty_option'	=> '-- Select category --',
						'value_options'	=> $categoryTable->itemInSelectbox(null, array('task' => 'list-book')),
						'label'	=> 'Category',
						'label_attributes'	=> array(
								'for'		=> 'category_id',
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
		
		// Sale Off Type
		$this->add(array(
				'name'			=> 'sale_off_type',
				'type'			=> 'Select',
				'options'		=> array(
						'empty_option'	=> '-- Select sale off type --',
						'value_options'	=> array(
								'number'	=> 'Number',
								'percent'	=> 'Percent',
								'none'		=> 'No Sale Off',
						),
						'label'	=> 'Sale off type',
						'label_attributes'	=> array(
								'for'		=> 'sale_off_type',
								'class'		=> 'col-xs-3 control-label',
						),
				),
				'attributes'	=> array(
						'class'			=> 'form-control',
				),
		));
		
		// Sale off value
		$this->add(array(
				'name'			=> 'sale_off_value',
				'type'			=> 'Text',
				'attributes'	=> array(
						'class'			=> 'form-control',
						'id'			=> 'sale_off_value',
						'placeholder'	=> 'Enter sale off value',
				),
				'options'		=> array(
						'label'				=> 'Sale off value',
						'label_attributes'	=> array(
								'for'		=> 'sale_off_value',
								'class'		=> 'col-xs-3 control-label',
						)
				),
		));
		
		// Special
		$this->add(array(
				'name'			=> 'special',
				'type'			=> 'Select',
				'options'		=> array(
						'empty_option'	=> '-- Select type --',
						'value_options'	=> array(
								'yes'		=> 'Special',
								'no'		=> 'Normal',
						),
						'label'	=> 'Book type',
						'label_attributes'	=> array(
								'for'		=> 'special',
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
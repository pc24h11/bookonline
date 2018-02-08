<?php
namespace Admin\Form;
use Admin\Model\BookTable;

use \Zend\Form\Form as Form;
use Zend\Form\Element as Element;

class Slider extends Form {
	
	public function __construct(BookTable $bookTable){
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
		
		// File avatar
		$this->add(array(
				'name'			=> 'file',
				'type'			=> 'File',
				'attributes'	=> array(
						'class'			=> 'form-control',
						'id'			=> 'file',
				),
				'options'		=> array(
						'label'				=> 'Avatar',
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
		
		// Book
		$this->add(array(
				'name'			=> 'book_id',
				'type'			=> 'Select',
				'options'		=> array(
						'empty_option'	=> '-- Select book --',
						'value_options'	=> $bookTable->itemInSelectbox(null, array('task' => 'form-slider')),
						'label'			=> 'Select book',
						'label_attributes'	=> array(
								'for'		=> 'book_id',
								'class'		=> 'col-xs-3 control-label',
						),
				),
				'attributes'	=> array(
						'class'			=> 'form-control',
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
<?php
namespace Admin\Form;
use Admin\Model\GroupTable;

use \Zend\Form\Form as Form;
use Zend\Form\Element as Element;

class User extends Form {
	
	public function __construct(GroupTable $groupTable){
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
		
		// Avatar
		$this->add(array(
				'name' 			=> 'avatar',
				'attributes' 	=> array(
						'type'  => 'hidden',
				),
		));
		
		// Username 
		$this->add(array(
				'name'			=> 'username',
				'type'			=> 'Text',
				'attributes'	=> array(
						'class'			=> 'form-control',
						'id'			=> 'username',
						'placeholder'	=> 'Enter username',
				),
				'options'		=> array(
						'label'				=> 'Username',
						'label_attributes'	=> array(
								'for'		=> 'username',
								'class'		=> 'col-xs-3 control-label',
						)
				),
		));
		
		// Sign
		$this->add(array(
				'name'			=> 'sign',
				'type'			=> 'Textarea',
				'attributes'	=> array(
						'class'			=> 'form-control',
						'id'			=> 'sign',
				),
				'options'		=> array(
						'label'				=> 'Sign',
						'label_attributes'	=> array(
								'for'		=> 'sign',
								'class'		=> 'col-xs-3 control-label',
						)
				),
		));
		
		// Email
		$this->add(array(
				'name'			=> 'email',
				'type'			=> 'Email',
				'attributes'	=> array(
						'class'			=> 'form-control',
						'id'			=> 'email',
						'placeholder'	=> 'Enter email',
				),
				'options'		=> array(
						'label'				=> 'Email',
						'label_attributes'	=> array(
								'for'		=> 'email',
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
		
		// Fullname
		$this->add(array(
				'name'			=> 'fullname',
				'type'			=> 'Text',
				'attributes'	=> array(
						'class'			=> 'form-control',
						'id'			=> 'fullname',
						'placeholder'	=> 'Enter fullname',
				),
				'options'		=> array(
						'label'				=> 'Fullname',
						'label_attributes'	=> array(
								'for'		=> 'fullname',
								'class'		=> 'col-xs-3 control-label',
						)
				),
		));
		
		// Password
		$this->add(array(
				'name'			=> 'password',
				'type'			=> 'Password',
				'attributes'	=> array(
						'class'			=> 'form-control',
						'id'			=> 'password',
						'placeholder'	=> 'Enter password',
				),
				'options'		=> array(
						'label'				=> 'Password',
						'label_attributes'	=> array(
								'for'		=> 'password',
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
		
		// Group
		$this->add(array(
				'name'			=> 'group',
				'type'			=> 'Select',
				'options'		=> array(
						'empty_option'	=> '-- Select group --',
						'value_options'	=> $groupTable->itemInSelectbox(null, array('task' => 'form-user')),
						'label'	=> 'Group',
						'label_attributes'	=> array(
								'for'		=> 'group',
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
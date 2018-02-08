<?php

namespace Zendvn\Form\View\Helper;
use Zend\Form\Element\Select;
use Zend\Form\View\Helper\FormSelect as ZendFormSelect;

class FormSelect extends ZendFormSelect
{
	public function __invoke($name, $emptyOption, $valueOptions, $keySelected, $options = null){
		$options['size']	= !empty($options['size']) ? $options['size'] : 1;
		$options['class']	= !empty($options['class']) ? $options['class'] : 'input-sm';
		
		$element	= new Select($name);
		$element->setAttributes($options);
		$element->setEmptyOption($emptyOption);
		$element->setValueOptions($valueOptions);
		$element->setValue($keySelected);
		
		return $this->render($element);
	}
    
}

<?php

namespace Zendvn\Form\View\Helper;
use Zend\Form\Element\Text;
use Zend\Form\View\Helper\FormInput as ZendFormInput;

class FormInput extends ZendFormInput
{
    public function __invoke($name, $value, $attributes = null)
    {
    	$attributes['class']	= !empty($attributes['class']) ? $attributes['class'] : 'col-xs-2';
    	$element = new Text($name);
    	$element->setValue($value);
    	$element->setAttributes($attributes);
    	
    	return $this->render($element);
    }
    
}

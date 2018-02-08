<?php

namespace Zendvn\Form\View\Helper;
use Zend\Form\Element\Button;
use Zend\Form\View\Helper\FormButton as ZendFormButton;

class FormButton extends ZendFormButton
{
    public function __invoke($name, $value, $label, $attributes = null)
    {
    	$attributes['class']	= 'btn btn-flat ' . (!empty($attributes['class']) ? $attributes['class'] : 'btn-default');
    	$attributes['type']		= !empty($attributes['type']) ? $attributes['type'] : 'submit';
    	$element = new Button($name);
    	$element->setValue($value);
    	$element->setAttributes($attributes);
    	$element->setLabel($label);
    	
    	return $this->render($element);
    }
    
}

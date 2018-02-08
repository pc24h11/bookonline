<?php
namespace Zendvn\Form\View\Helper;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\FormElementErrors;

class FormError extends FormElementErrors {
	
	public function __invoke(ElementInterface $element = null)
    {
       	$messages	= $element->getMessages();
       	if(empty($messages)) return '';
       	
       	return sprintf('<span class="error help-inline">%s</span>',current($messages));
    }
}
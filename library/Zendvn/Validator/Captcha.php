<?php
namespace Zendvn\Validator;

use Zend\Validator\AbstractValidator;

class Captcha extends AbstractValidator{
	const NOT_EQUAL   = 'captchaNotEqual';
	
	protected $_captchaID;
	protected $messageTemplates = array(
			self::NOT_EQUAL   => "Mã xác nhận không chính xác!",
	);
	
	
	public function __construct($captchaID)
	{
		$this->_captchaID	= $captchaID;
		parent::__construct($captchaID);	// Không có sẽ không lấy được thông báo lỗi
	}
	
	
	public function isValid($value) {
		$captchaSession		= new \Zend\Session\Container('Zend_Form_Captcha_' . $this->_captchaID);
    		 
    	if(strcmp($value, $captchaSession->word) != 0){
    		$this->error(self::NOT_EQUAL);
    		return false;
    	}
    	
    	return true;
	}


}
<?php
namespace Zendvn\Captcha;

use Zend\Captcha\Image as ZendImage;

class Image extends ZendImage {
	
	protected $imgAlt 		= "ZendVN Captcha";
	protected $suffix 		= ".png";
	protected $width 		= 200;
	protected $height 		= 50;
	protected $fsize 		= 24;
	protected $wordlen 		= 4;
	protected $font;
	protected $expiration 		= 20;
	protected $dotNoiseLevel 	= 50;
	protected $lineNoiseLevel 	= 2;
	
	public function __construct($width = 200, $height = 50, $options = null) {
		 
		$this->font				= !empty($options['font']) ? $options['font'] : CAPTCHA_PATH . '/fonts/font-one.OTF';
		$this->fsize			= !empty($options['fsize']) ? $options['fsize'] : $this->fsize;
		$this->imgDir			= CAPTCHA_PATH . '/images';
		$this->imgUrl			= CAPTCHA_URL . '/images';
		$this->wordlen			= !empty($options['wordlen']) ? $options['wordlen'] : $this->wordlen;
		$this->width			= !empty($width) ? $width : $this->width;
		$this->height			= !empty($height) ? $height : $this->height;
		$this->dotNoiseLevel	= !empty($options['dotNoiseLevel']) ? $options['dotNoiseLevel'] : $this->dotNoiseLevel;
		$this->lineNoiseLevel	= !empty($options['lineNoiseLevel']) ? $options['lineNoiseLevel'] : $this->lineNoiseLevel;
		$this->suffix			= !empty($options['suffix']) ? $options['suffix'] : $this->suffix;
		$this->expiration		= !empty($options['expiration']) ? $options['expiration'] : $this->expiration;
		
		$this->setImgDir($this->imgDir);
		$this->setImgUrl($this->imgUrl);
		$this->setFont($this->font);
		$this->setFontSize($this->fsize);
		$this->setWordlen($this->wordlen);
		$this->setWidth($this->width);
		$this->setHeight($this->height);
		$this->setDotNoiseLevel($this->dotNoiseLevel);
		$this->setLineNoiseLevel($this->lineNoiseLevel);
		$this->setSuffix($this->suffix);
		$this->setExpiration($this->expiration);
// 		AbstractWord::$VN	= array('a');
// 		AbstractWord::$CN	= array('a', '1');
		 
		// Phát sinh captcha
		$this->generate();
	}

	public function removeImage( $captchaID, $options = null){
		if($options == null) {
			$imgLink	= $this->getImgDir() . $captchaID . $this->getSuffix();
			@unlink($imgLink);
		}
	}
}
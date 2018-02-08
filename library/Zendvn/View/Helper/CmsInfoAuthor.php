<?php
namespace Zendvn\View\Helper;
use Zend\View\Helper\AbstractHelper;

class CmsInfoAuthor extends AbstractHelper {
	
	public function __invoke($time, $author, $options = null){
		return sprintf('<p>%s</p><span><i class="fa fa-fw fa-user"></i>%s</span>', $time, $author);
	}
}
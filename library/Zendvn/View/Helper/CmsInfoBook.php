<?php
namespace Zendvn\View\Helper;
use Zend\View\Helper\AbstractHelper;

class CmsInfoBook extends AbstractHelper {
	
	public function __invoke($picture, $linkEdit, $name, $options = null){
		
		if(!empty($picture)){
			$avatarURL	= URL_FILES . '/users/thumb/' . $picture;
		}else{
			$avatarURL	= URL_FILES . '/users/thumb/no-avatar.png';
		}
		
		return sprintf('<div class="user-panel" style="text-align:left">
							<div class="pull-left image">
								<img src="%s" class="img-circle" alt="User Image">
							</div>
							<div class="pull-left info">
								<p><a href="%s">%s</a></p>
							</div>
						</div>', $picture, $linkEdit, $name);
	}
}
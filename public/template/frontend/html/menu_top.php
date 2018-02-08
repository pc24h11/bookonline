<?php 
	
	use Zendvn\System\Info;

if($this->identity()) {	// Login
		$arrMenu		= array(
				array('name' => 'Home'		, 'icon' => 'home', 'controller' => 'index', 'action' => 'index', 'link' =>$this->linkHome()),
				array('name' => 'My Account', 'icon' => 'lock', 'controller' => 'user', 'action' => 'history', 'link' =>$this->linkHistory()),
				array('name' => 'Logout'	, 'icon' => 'lock', 'controller' => 'index', 'action' => 'logout', 'link' =>$this->linkLogout()),
		);
		
		$infoObj	= new Info();
		if($infoObj->getGroupInfo('group_acp') == 1){
			$arrMenu[]	= array('name' => 'Admin Control Panel'	, 'icon' => 'lock', 'controller' => 'user', 'action' => 'admin','link'=>$this->linkAdmin());
		}
		
	}else{	// Not Login
		$arrMenu		= array(
				array('name' => 'Home'		, 'icon' => 'home', 'controller' => 'index', 'action' => 'index', 'link' =>$this->linkHome()),
				array('name' => 'Login'		, 'icon' => 'lock', 'controller' => 'index', 'action' => 'login', 'link' =>$this->linkLogin()),
				array('name' => 'Register'	, 'icon' => 'user', 'controller' => 'index', 'action' => 'register', 'link' =>$this->linkRegister()),
		);
	}
	
	
	$strMenu	= '';
	foreach ($arrMenu as $menu){
		$class	= ($menu['controller'] == $this->controller && $menu['action'] == $this->action) ? 'class="active"' : '';
		$strMenu  .= sprintf('<li><a %s href="%s"><i class="fa fa-%s"></i>%s</a></li>',
								$class,
								$menu['link'],
								$menu['icon'],
								$menu['name']
							);
	}
?>

<div class="toprow">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="socials">
					<a href="//www.facebook.com/"><i class="fa fa-facebook"></i></a> 
					<a href="//www.twitter.com/"><i class="fa fa-twitter"></i></a>
				</div>
				<ul class="links">
					<?php echo $strMenu;?>
				</ul>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
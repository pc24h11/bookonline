<?php 
	// <small class="badge pull-right bg-red">3</small>
	$arrMenus	= array(
		array('class' => 'index'	, 'name' => 'Control Panel'	, 'icon' => 'dashboard'		, 'link' => $this->basePath('admin/index/index')),		
		array('class' => 'config'	, 'name' => 'Config'		, 'icon' => 'cog'			, 'link' => '#', 'children' => array(
			array('class' => 'config-email'		, 'name' => 'Email'			, 'icon' => 'angle-double-right'			, 'link' => $this->basePath('admin/config/email')),
			array('class' => 'config-image'		, 'name' => 'Image'			, 'icon' => 'angle-double-right'			, 'link' => $this->basePath('admin/config/image')),
		)),	
			
		array('class' => 'group'	, 'name' => 'Group'			, 'icon' => 'group'			, 'link' => $this->basePath('admin/group/index')),		
		array('class' => 'user'		, 'name' => 'User'			, 'icon' => 'user'			, 'link' => $this->basePath('admin/user/index')),		
		array('class' => 'category'	, 'name' => 'Category'		, 'icon' => 'suitcase'		, 'link' => $this->basePath('admin/category/index')),		
		array('class' => 'book'		, 'name' => 'Book'			, 'icon' => 'book'			, 'link' => $this->basePath('admin/book/index')),		
		array('class' => 'cart'		, 'name' => 'Cart'			, 'icon' => 'shopping-cart'	, 'link' => $this->basePath('admin/cart/index')),		
		array('class' => 'slider'	, 'name' => 'Slider'		, 'icon' => 'picture-o'	, 'link' => $this->basePath('admin/slider/index')),		
	);
	
	$xhtmlMenu = '';
	foreach ($arrMenus as $menu){
		if(!empty($menu['children'])){
			$xhtmlChildMenu		= '';
			foreach ($menu['children'] as $menuChild){
				$xhtmlChildMenu .= sprintf('<li class="admin-%s">
												<a href="%s" style="margin-left: 10px;">
													<i class="fa fa-%s"></i> %s
												</a>
											</li>',$menuChild['class'], $menuChild['link'], $menuChild['icon'], $menuChild['name']);
			}
			$xhtmlMenu .= sprintf('<li class="treeview admin-%s">
										<a href="%s"> 
											<i class="fa fa-%s"></i> <span>%s</span><i class="fa fa-angle-left pull-right"></i>
										</a>
										<ul class="treeview-menu">
											%s
										</ul>
									</li>',$menu['class'], $menu['link'], $menu['icon'], $menu['name'], $xhtmlChildMenu);
		}else{
			$xhtmlMenu .= sprintf('<li class="admin-%s">
									<a href="%s"> 
										<i class="fa fa-%s"></i><span>%s</span>
									</a>
								</li>',$menu['class'], $menu['link'], $menu['icon'], $menu['name']);
		}
	}

?>


<section class="sidebar">

	<!-- Sidebar user panel -->
	<div class="user-panel">
		<div class="pull-left image">
			<img src="<?php echo $urlImage;?>/avatar3.png" class="img-circle" alt="User Image">
		</div>
		<div class="pull-left info">
			<p>Hello, Jane</p>
			<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		</div>
	</div>

	<!-- sidebar menu: : style can be found in sidebar.less -->
	<ul class="sidebar-menu">
		<?php echo $xhtmlMenu;?>
	</ul>
</section>
<?php 
	use Zendvn\System\Info;

	$infoObj	= new Info();
	$userInfo	= $infoObj->getUserInfo();
	if(!empty($userInfo)){
		$name	= $userInfo->fullname;
		if(!empty($userInfo->avatar)){
			$avatarURL	= URL_FILES . '/users/thumb/' . $userInfo->avatar;
		}else{
			$avatarURL	= URL_FILES . '/users/thumb/no-avatar.png';
		}
		$date	= date('F.Y', strtotime($userInfo->created));
	}
	$linkLogout	= $this->url('shopRoute/default', array('controller' => 'index', 'action' => 'logout'));
?>

<nav class="navbar navbar-static-top" role="navigation">
	<!-- Sidebar toggle button-->
	<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> 
		<span class="sr-only">Toggle navigation</span> 
		<span class="icon-bar"></span> 
		<span class="icon-bar"></span> 
		<span class="icon-bar"></span>
	</a>
	
	<div class="navbar-right">
		<ul class="nav navbar-nav">
			<!-- User Account: style can be found in dropdown.less -->
			<li class="dropdown user user-menu"><a href="#"
				class="dropdown-toggle" data-toggle="dropdown"> <i
					class="glyphicon glyphicon-user"></i> <span><?php echo $name;?><i
						class="caret"></i></span>
			</a>
				<ul class="dropdown-menu">
					<!-- User image -->
					<li class="user-header bg-light-blue"><img src="<?php echo $avatarURL;?>"
						class="img-circle" alt="User Image" />
						<p>
							<?php echo $name;?><small>Member since <?php echo $date;?></small>
						</p></li>
					<!-- Menu Body -->
					
					<!-- Menu Footer-->
					<li class="user-footer">
						<div class="pull-left">
							<a href="#" class="btn btn-default btn-flat">Profile</a>
						</div>
						<div class="pull-right">
							<a href="<?php echo $linkLogout;?>" class="btn btn-default btn-flat">Sign out</a>
						</div>
					</li>
				</ul></li>
		</ul>
	</div>
</nav>
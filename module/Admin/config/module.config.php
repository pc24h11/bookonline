<?php
return array(
	'controllers'	=> array(
			'invokables' => array (
					'Admin\Controller\Index' 	=> 'Admin\Controller\IndexController',
					'Admin\Controller\Group' 	=> 'Admin\Controller\GroupController',
					'Admin\Controller\Config' 	=> 'Admin\Controller\ConfigController',
					'Admin\Controller\User' 	=> 'Admin\Controller\UserController',
					'Admin\Controller\Category' => 'Admin\Controller\CategoryController',
					'Admin\Controller\Book' 	=> 'Admin\Controller\BookController',
					'Admin\Controller\Cart' 	=> 'Admin\Controller\CartController',
					'Admin\Controller\Nested' 	=> 'Admin\Controller\NestedController',
					'Admin\Controller\Slider' 	=> 'Admin\Controller\SliderController',
			)
	),
	'view_manager'	=> array(
			'doctype'					=> 'HTML5',
			'display_not_found_reason' 	=> true,
			'not_found_template'       	=> 'error/404',
				
			'display_exceptions'       	=> true,
			'exception_template'       	=> 'error/index',
			
			'template_path_stack'		=> array(__DIR__ . '/../view'),
			'template_map' 				=> array(
					'layout/layout'   	=> PATH_TEMPLATE . '/frontend/layout.phtml',
					'layout/frontend'   => PATH_TEMPLATE . '/frontend/main.phtml',
					'layout/backend'    => PATH_TEMPLATE . '/backend/main.phtml',
					'layout/error'		=> PATH_TEMPLATE . '/error/layout.phtml',
					'error/404'			=> PATH_TEMPLATE . '/error/404.phtml',
					'error/index'		=> PATH_TEMPLATE . '/error/index.phtml',
			),
			'default_template_suffix'  	=> 'phtml',
			'layout'					=> 'layout/layout'
	),
		
	'view_helper_config' => array(
			'flashmessenger' => array(
					'message_open_format'      => '<div class="row"><div class="alert alert-success alert-dismissable ">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>',
					'message_close_string'     => '</div></div>',
					'message_separator_string' => ''
			)
	),

); 
<?php

// HOME
$routeHome	= array(
		'type' => 'Zend\Mvc\Router\Http\Literal',
		'options' => array (
				'route' => '/',
				'defaults' => array (
						'__NAMESPACE__' => 'Shop\Controller',
						'controller' 	=> 'Index',
						'action' 		=> 'index' 
				) 
		) 
);

// LOGIN
$routeLogin	= array(
		'type' => 'Segment',
		'options' => array (
				'route' => '/login.html',
				'defaults' => array (
						'__NAMESPACE__' => 'Shop\Controller',
						'controller' 	=> 'Index',
						'action' 		=> 'login'
				)
		)
);

// REGISTER
$routeRegister	= array(
		'type' => 'Segment',
		'options' => array (
				'route' => '/register.html',
				'defaults' => array (
						'__NAMESPACE__' => 'Shop\Controller',
						'controller' 	=> 'Index',
						'action' 		=> 'register'
				)
		)
);

// LOGOUT
$routeLogout	= array(
		'type' => 'Segment',
		'options' => array (
				'route' => '/logout.html',
				'defaults' => array (
						'__NAMESPACE__' => 'Shop\Controller',
						'controller' 	=> 'Index',
						'action' 		=> 'logout'
				)
		)
);

// HISTORY
$routeHistory	= array(
		'type' => 'Segment',
		'options' => array (
				'route' => '/user/history.html',
				'defaults' => array (
						'__NAMESPACE__' => 'Shop\Controller',
						'controller' 	=> 'User',
						'action' 		=> 'history'
				)
		)
);

// CART
$routeCart	= array(
		'type' => 'Segment',
		'options' => array (
				'route' => '/user/cart.html',
				'defaults' => array (
						'__NAMESPACE__' => 'Shop\Controller',
						'controller' 	=> 'User',
						'action' 		=> 'view-cart'
				)
		)
);

// CATEGORY
// http://bookonline.vn/category/php-programming-15.html
$routeCategory = array(
		'type' 		=> 'Regex',
		'options' 	=> array(
				'regex' 	=> '/category/(?<name>[a-zA-Z0-9_-]*)-(?<id>[0-9]*).(?<extension>(html|php))',
				'defaults' 	=> array(
						'__NAMESPACE__' 	=> 'Shop\Controller',
						'controller' 		=> 'Category',
						'action' 			=> 'index',
						'extension' 		=> 'html',
				),
				'spec' 		=> '/category/%name%-%id%.%extension%',
		),
		'priority'	=> 5,
		'may_terminate' => true,
		'child_routes' => array (
				'filter' => array (
						'type' 		=> 'Segment',
						'options' 	=> array (
								'route' => '[/display/:display][/order/:order][/dir/:dir][/limit/:limit][/page/:page][/]',
								'constraints' => array (
										'page' 			=> '[0-9]*',
										'display' 		=> 'grid|list',
										'order' 		=> 'id|name|price',
										'dir' 			=> 'ASC|DESC',
										'limit' 		=> '[0-9]*',
								),
								'defaults' => array (
								)
						)
				),
		)
);

// BOOK
$routeBook = array(
		'type' 		=> 'Regex',
		'options' 	=> array(
				'regex' 	=> '/(?<category_name>[a-zA-Z0-9_-]*)/(?<name>[a-zA-Z0-9_-]*)-(?<id>[0-9]*).(?<extension>(html|php))',
				'defaults' 	=> array(
						'__NAMESPACE__' 	=> 'Shop\Controller',
						'controller' 		=> 'Book',
						'action' 			=> 'index',
						'extension' 		=> 'html',
				),
				'spec' 		=> '/%category_name%/%name%-%id%.%extension%',
		),
		'priority'	=> 4
);

// Admin\Controller\Index - indexAction
$shopRoute	= array(
		'type' => 'Literal',
		'options' => array (
				'route' => '/shop',
				'defaults' => array (
						'__NAMESPACE__' => 'Shop\Controller',
						'controller' 	=> 'Index',
						'action' 		=> 'index' 
				)
		),
		'may_terminate' => true,
		'child_routes' => array (
				'default' => array (
						'type' 		=> 'Segment',
						'options' 	=> array (
								'route' => '/[:controller[/:action[/:id]]][/]',
								'constraints' => array (
										'controller' 	=> '[a-zA-Z][a-zA-Z0-9_-]*',
										'action' 		=> '[a-zA-Z][a-zA-Z0-9_-]*',
										'id' 			=> '[0-9]*',
								),
								'defaults' => array (
								)
						)
				),
				'active' => array (
						'type' 		=> 'Segment',
						'options' 	=> array (
								'route' => '/user/active/:id/code/:code[/]',
								'constraints' => array (
										'id' 			=> '[0-9]*',
								),
								'defaults' => array (
										'__NAMESPACE__' => 'Shop\Controller',
										'controller' 	=> 'User',
										'action' 		=> 'active'
								)
						)
				),
				'order' => array (
						'type' 		=> 'Segment',
						'options' 	=> array (
								'route' => '/user/order/:id/price/:price[/quantity/:quantity][/]',
								'constraints' => array (
										'id' 			=> '[0-9]*',
										'price' 		=> '[0-9]*',
										'quantity' 		=> '[0-9]*',
								),
								'defaults' => array (
										'__NAMESPACE__' => 'Shop\Controller',
										'controller' 	=> 'User',
										'action' 		=> 'order',
										'quantity' 		=> 1,
								)
						)
				),
				'category' => array (
						'type' 		=> 'Segment',
						'options' 	=> array (
								'route' => '/category/index/:id[/display/:display][/order/:order][/dir/:dir][/limit/:limit][/page/:page][/]',
								'constraints' => array (
										'id' 			=> '[0-9]*',
										'page' 			=> '[0-9]*',
										'display' 		=> 'grid|list',
										'order' 		=> 'id|name|price',
										'dir' 			=> 'ASC|DESC',
										'limit' 		=> '[0-9]*',
								),
								'defaults' => array (
										'__NAMESPACE__' => 'Shop\Controller',
										'controller' 	=> 'Category',
										'action' 		=> 'index'
								)
						)
				),
		)
);

return array(
	'router'		=> array(
			'routes' => array(
					'routeHome'		=> $routeHome,
					'routeLogin'	=> $routeLogin,
					'routeRegister'	=> $routeRegister,
					'routeLogout'	=> $routeLogout,
					'routeHistory'	=> $routeHistory,
					'routeCart'		=> $routeCart,
					'routeCategory'	=> $routeCategory,
					'routeBook'		=> $routeBook,
					'shopRoute'		=> $shopRoute,
			),
	)
		
); 
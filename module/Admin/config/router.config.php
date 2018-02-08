<?php

// URL: /
// Admin\Controller\Index - indexAction
$homeRoute	= array(
		'type' => 'Zend\Mvc\Router\Http\Literal',
		'options' => array (
				'route' => '/',
				'defaults' => array (
						'__NAMESPACE__' => 'Admin\Controller',
						'controller' 	=> 'Index',
						'action' 		=> 'index' 
				) 
		) 
);

// URL: /backend/[controller/action]
// Admin\Controller\Index - indexAction
$adminRoute	= array(
		'type' => 'Literal',
		'options' => array (
				'route' => '/admin',
				'defaults' => array (
						'__NAMESPACE__' => 'Admin\Controller',
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
				'paginator' => array (
						'type' 		=> 'Segment',
						'options' 	=> array (
								'route' => '/:controller/index/page[/:page][/]',
								'constraints' => array (
										'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
										'page' 		=> '[0-9]*'
								),
								'defaults' => array ()
						)
				)
		)
);

return array(
	'router'		=> array(
			'routes' => array(
					'home'			=> $homeRoute,
					'adminRoute'	=> $adminRoute,
			),
	)
		
); 
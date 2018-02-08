<?php
	include_once 'define.php';
	include_once PATH_LIBRARY . '/Zend/Loader/AutoloaderFactory.php';
	
	chdir(dirname(__DIR__));
	
	if(!class_exists('Zend\Loader\AutoloaderFactory')){
		die('Zend\Loader\AutoloaderFactory is not exist!');
	}
	
	\Zend\Loader\AutoloaderFactory::factory(array(
			'Zend\Loader\StandardAutoloader' => array(
					'autoregister_zf' 	=> true,
					'namespaces'		=> array(
							'Zendvn'			=> PATH_LIBRARY . '/Zendvn',
							'PHPImageWorkshop'	=> PATH_VENDOR . '/PHPImageWorkshop',
							'Block'				=> PATH_APPLICATION . '/block',
					),
					'prefixes'		 => array(
							'HTMLPurifier'	=> PATH_VENDOR . '/HTMLPurifier'
					)
			),
	));
	
	\Zend\Mvc\Application::init(require_once 'config/application.config.php')->run();
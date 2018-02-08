<?php
namespace Shop;

use Shop\Form\LoginFilter;
use Shop\Form\Login;
use Shop\Form\RegisterFilter;
use Shop\Form\User;

use Zend\Db\TableGateway\Feature\GlobalAdapterFeature;
use Zend\Stdlib\Hydrator\ObjectProperty;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
    	$eventManager			= $e->getApplication()->getEventManager();
    	$moduleRouteListener	= new ModuleRouteListener();
    	$moduleRouteListener->attach ( $eventManager );
	}
	
	public function getFormElementConfig() {
		return array (
				'factories' => array(
    					'formShopRegister'	=> function($sm){
    						$myForm	= new \Shop\Form\Register();
    						$myForm->setInputFilter(new \Shop\Form\RegisterFilter());
    						return $myForm;
    					},
    					'formShopLogin'	=> function($sm){
    						$myForm	= new \Shop\Form\Login();
    						$myForm->setInputFilter(new \Shop\Form\LoginFilter());
    						return $myForm;
    					},
    			),
    	);
    }
    
    public function getConfig()
    {
        return array_merge(
    			require_once __DIR__ . '/config/module.config.php',
    			require_once __DIR__ . '/config/router.config.php'
    	);
    }

    public function getAutoloaderConfig()
    {
        return array(
        		'Zend\Loader\ClassMapAutoloader'	=> array(
        				__DIR__ . '/autoload_classmap.php'
        		),
	            'Zend\Loader\StandardAutoloader' => array(
	                'namespaces' => array(
	                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
	                ),
	            ),
        );
    }
	
	public function getServiceConfig(){
		return array(
				'factories'	=> array(
						'AuthenticateService'	=> function ($sm){
							$dbTableAdapter		= new \Zend\Authentication\Adapter\DbTable($sm->get('dbConfig'), TABLE_USER, 'email', 'password', 'MD5(?)');
							$dbTableAdapter->getDbSelect()->where->equalTo('status', 1)
													      ->where->equalTo('active_code', 1);
							$authenticateServiceObj	= new \Zend\Authentication\AuthenticationService(null, $dbTableAdapter);
							return $authenticateServiceObj;
						},
						'MyAuth'	=> function ($sm){
							return  new \Zendvn\System\Authenticate($sm->get('AuthenticateService'));
						},
						'Shop\Model\CategoryTable'	=> function ($sm) {
							$tableGateway	= $sm->get('CategoryTableGateway');
							return new \Shop\Model\CategoryTable($tableGateway);
						},
						'Shop\Model\BookTable'	=> function ($sm) {
							$tableGateway	= $sm->get('BookTableGateway');
							return new \Shop\Model\BookTable($tableGateway);
						},
						'Shop\Model\SliderTable'	=> function ($sm) {
							$tableGateway	= $sm->get('SliderTableGateway');
							return new \Shop\Model\SliderTable($tableGateway);
						},
						'Shop\Model\UserTable'	=> function ($sm) {
							$tableGateway	= $sm->get('UserTableGateway');
							return new \Shop\Model\UserTable($tableGateway);
						},
						'Shop\Model\GroupTable'	=> function ($sm) {
							$tableGateway	= $sm->get('GroupTableGateway');
							return new \Shop\Model\GroupTable($tableGateway);
						},
						'Shop\Model\PermissionTable'	=> function ($sm) {
							$tableGateway	= $sm->get('PermissionTableGateway');
							return new \Shop\Model\PermissionTable($tableGateway);
						},
						'Shop\Model\CartTable'	=> function ($sm) {
							$tableGateway	= $sm->get('CartTableGateway');
							return new \Shop\Model\CartTable($tableGateway);
						},
				),
				'invokables' => array(
						'Zend\Authentication\AuthenticationService' => 'Zend\Authentication\AuthenticationService',
				),
		);
	}

	public function getViewHelperConfig(){
		return array(
				'invokables'	=> array(
						'blkFacebook'		=> '\Block\BlkFacebook',
						'blkUserLink'		=> '\Block\BlkUserLink',
						'cmsBreadcrumb'		=> '\Zendvn\View\Helper\CmsBreadcrumb',
						'cmsSummary'		=> '\Zendvn\View\Helper\CmsSummary', 
						'cmsChangeDisplay'	=> '\Zendvn\View\Helper\CmsChangeDisplay', 
						'cmsLinkInfoBook'	=> '\Zendvn\View\Helper\CmsLinkInfoBook', 
						'CmsPriceReal'		=> '\Zendvn\View\Helper\CmsPriceReal', 
						'formError'			=> '\Zendvn\Form\View\Helper\FormError', 
						'linkHome'			=> '\Zendvn\View\Helper\Url\LinkHome', 
						'linkLogin'			=> '\Zendvn\View\Helper\Url\LinkLogin', 
						'linkRegister'		=> '\Zendvn\View\Helper\Url\LinkRegister',
						'linkLogout'		=> '\Zendvn\View\Helper\Url\LinkLogout',
						'linkHistory'		=> '\Zendvn\View\Helper\Url\LinkHistory',
						'linkCart'			=> '\Zendvn\View\Helper\Url\LinkCart',
						'linkCategory'		=> '\Zendvn\View\Helper\Url\LinkCategory',
						'linkBook'			=> '\Zendvn\View\Helper\Url\LinkBook',
						'linkAdmin'			=> '\Zendvn\View\Helper\Url\LinkAdmin',
						'linkListBook'		=> '\Zendvn\View\Helper\Url\LinkListBook',
				),
				'factories'	=> array(
					'blkCategory'		=> function($sm){
						$helper	= new \Block\BlkCategory();
						$helper->setData($sm->getServiceLocator()->get('Shop\Model\CategoryTable'));
						return $helper;
					},
					'blkSpecial'		=> function($sm){
						$helper	= new \Block\BlkSpecial();
						$helper->setData($sm->getServiceLocator()->get('Shop\Model\BookTable'));
						return $helper;
					},
					'blkSlider'			=> function($sm){
						$helper	= new \Block\BlkSlider();
						$helper->setData($sm->getServiceLocator()->get('Shop\Model\SliderTable'));
						return $helper;
					},
					'blkNewBook'		=> function($sm){
						$helper	= new \Block\BlkNewBook();
						$helper->setData($sm->getServiceLocator()->get('Shop\Model\BookTable'));
						return $helper;
					},
					'systemInfo'		=> function($sm){
						return $sm->getServiceLocator()->get('Zendvn\System\Info');
					},
				),
		);
	}

}
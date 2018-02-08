<?php
namespace Admin;
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
    	$moduleRouteListener->attach($eventManager);
    	
    	$adapter	= $e->getApplication()->getServiceManager()->get('dbConfig');
    	GlobalAdapterFeature::setStaticAdapter($adapter);
    }

    public function getFormElementConfig(){
    	return array(
    			'factories'	=> array(
    					'formAdminGroup'	=> function($sm){
    						$myForm	= new \Admin\Form\Group();
    						$myForm->setInputFilter(new \Admin\Form\GroupFilter());
    						return $myForm;
    					},
    					'formAdminUser'	=> function($sm){
    						$groupTable = $sm->getServiceLocator()->get('Admin\Model\GroupTable');
    						$myForm		= new \Admin\Form\User($groupTable);
    						$myForm->setInputFilter(new \Admin\Form\UserFilter());
    						return $myForm;
    					},
    					'formAdminCategory'	=> function($sm){
    						$categoryTable = $sm->getServiceLocator()->get('Admin\Model\CategoryTable');
    						$myForm		= new \Admin\Form\Category($categoryTable);
    						$myForm->setInputFilter(new \Admin\Form\CategoryFilter());
    						return $myForm;
    					},
    					'formAdminBook'	=> function($sm){
    						$categoryTable = $sm->getServiceLocator()->get('Admin\Model\CategoryTable');
    						$myForm		= new \Admin\Form\Book($categoryTable);
    						$myForm->setInputFilter(new \Admin\Form\BookFilter());
    						return $myForm;
    					},
    					'formAdminSlider'	=> function($sm){
    						$bookTable 	= $sm->getServiceLocator()->get('Admin\Model\BookTable');
    						$myForm			= new \Admin\Form\Slider($bookTable);
    						$myForm->setInputFilter(new \Admin\Form\SliderFilter());
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
						'GroupTableGateway'	=> function ($sm) {
							$adapter			= $sm->get('dbConfig');
							$resultSetPrototype	= new HydratingResultSet();
							$resultSetPrototype->setHydrator(new ObjectProperty());
							$resultSetPrototype->setObjectPrototype(new \Zendvn\Model\Entity\Group());
							return new TableGateway(TABLE_GROUP, $adapter, null, $resultSetPrototype);
						},
						'Admin\Model\GroupTable'	=> function ($sm) {
							$tableGateway	= $sm->get('GroupTableGateway');
							return new \Admin\Model\GroupTable($tableGateway);
						},
						'UserTableGateway'	=> function ($sm) {
							$adapter			= $sm->get('dbConfig');
							$resultSetPrototype	= new HydratingResultSet();
							$resultSetPrototype->setHydrator(new ObjectProperty());
							$resultSetPrototype->setObjectPrototype(new \Zendvn\Model\Entity\User());
							return new TableGateway(TABLE_USER, $adapter, null, $resultSetPrototype);
						},
						'Admin\Model\UserTable'	=> function ($sm) {
							$tableGateway	= $sm->get('UserTableGateway');
							return new \Admin\Model\UserTable($tableGateway);
						},
						'NestedTableGateway'	=> function ($sm) {
							$adapter			= $sm->get('dbConfig');
							$resultSetPrototype	= new HydratingResultSet();
							$resultSetPrototype->setHydrator(new ObjectProperty());
							$resultSetPrototype->setObjectPrototype(new \Zendvn\Model\Entity\Nested());
							return new TableGateway(TABLE_NESTED, $adapter, null, $resultSetPrototype);
						},
						'Admin\Model\NestedTable'	=> function ($sm) {
							$tableGateway	= $sm->get('NestedTableGateway');
							return new \Admin\Model\NestedTable($tableGateway);
						},
						'CategoryTableGateway'	=> function ($sm) {
							$adapter			= $sm->get('dbConfig');
							$resultSetPrototype	= new HydratingResultSet();
							$resultSetPrototype->setHydrator(new ObjectProperty());
							$resultSetPrototype->setObjectPrototype(new \Zendvn\Model\Entity\Category());
							return new TableGateway(TABLE_CATEGORY, $adapter, null, $resultSetPrototype);
						},
						'Admin\Model\CategoryTable'	=> function ($sm) {
							$tableGateway	= $sm->get('CategoryTableGateway');
							return new \Admin\Model\CategoryTable($tableGateway);
						},
						'BookTableGateway'	=> function ($sm) {
							$adapter			= $sm->get('dbConfig');
							$resultSetPrototype	= new HydratingResultSet();
							$resultSetPrototype->setHydrator(new ObjectProperty());
							$resultSetPrototype->setObjectPrototype(new \Zendvn\Model\Entity\Book());
							return new TableGateway(TABLE_BOOK, $adapter, null, $resultSetPrototype);
						},
						'Admin\Model\BookTable'	=> function ($sm) {
							$tableGateway	= $sm->get('BookTableGateway');
							return new \Admin\Model\BookTable($tableGateway);
						},
						'SliderTableGateway'	=> function ($sm) {
							$adapter			= $sm->get('dbConfig');
							$resultSetPrototype	= new HydratingResultSet();
							$resultSetPrototype->setHydrator(new ObjectProperty());
							$resultSetPrototype->setObjectPrototype(new \Zendvn\Model\Entity\Slider());
							return new TableGateway(TABLE_SLIDER, $adapter, null, $resultSetPrototype);
						},
						'Admin\Model\SliderTable'	=> function ($sm) {
							$tableGateway	= $sm->get('SliderTableGateway');
							return new \Admin\Model\SliderTable($tableGateway);
						},
						'PermissionTableGateway'	=> function ($sm) {
							$adapter			= $sm->get('dbConfig');
							$resultSetPrototype	= new HydratingResultSet();
							$resultSetPrototype->setHydrator(new ObjectProperty());
							$resultSetPrototype->setObjectPrototype(new \Zendvn\Model\Entity\Permission());
							return new TableGateway(TABLE_PERMISSION, $adapter, null, $resultSetPrototype);
						},
						'CartTableGateway'	=> function ($sm) {
							$adapter			= $sm->get('dbConfig');
							$resultSetPrototype	= new HydratingResultSet();
							$resultSetPrototype->setHydrator(new ObjectProperty());
							$resultSetPrototype->setObjectPrototype(new \Zendvn\Model\Entity\Cart());
							return new TableGateway(TABLE_CART, $adapter, null, $resultSetPrototype);
						},
				),
		);
	}

	public function getViewHelperConfig(){
		return array(
				'invokables'	=> array(
						'cmsLinkSort'		=> '\Zendvn\View\Helper\CmsLinkSort',
						'cmsInfoPrice'		=> '\Zendvn\View\Helper\CmsInfoPrice',
						'cmsInfoUser'		=> '\Zendvn\View\Helper\CmsInfoUser',
						'cmsInfoAuthor'		=> '\Zendvn\View\Helper\CmsInfoAuthor',
						'cmsLinkAdmin'		=> '\Zendvn\View\Helper\CmsLinkAdmin',
						'cmsButtonStatus'	=> '\Zendvn\View\Helper\CmsButtonStatus',
						'cmsButtonGroupACP'	=> '\Zendvn\View\Helper\CmsButtonGroupACP',
						'cmsButtonSpecial'	=> '\Zendvn\View\Helper\CmsButtonSpecial',
						'cmsButtonMove'		=> '\Zendvn\View\Helper\CmsButtonMove',
						'cmsButtonToolbar'	=> '\Zendvn\View\Helper\CmsButtonToolbar',
						'zvnFormHidden'		=> '\Zendvn\Form\View\Helper\FormHidden',
						'zvnFormSelect'		=> '\Zendvn\Form\View\Helper\FormSelect',
						'zvnFormInput'		=> '\Zendvn\Form\View\Helper\FormInput',
						'zvnFormButton'		=> '\Zendvn\Form\View\Helper\FormButton',
				)
		);
	}

}
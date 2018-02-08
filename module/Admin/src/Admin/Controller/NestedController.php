<?php
namespace Admin\Controller;

use Zendvn\Controller\ActionController;
use Zend\Form\FormInterface;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;

use Zendvn\Paginator\Paginator as ZendvnPaginator;

class NestedController extends ActionController
{
	public function init(){
		// SESSION FILTER
		$ssFilter	= new Container(__CLASS__);
		
		$this->_params['ssFilter']['order_by']				= !empty($ssFilter->order_by) ? $ssFilter->order_by : 'id';
		$this->_params['ssFilter']['order']					= !empty($ssFilter->order) ? $ssFilter->order : 'DESC';
		$this->_params['ssFilter']['filter_status']			= $ssFilter->filter_status;
		$this->_params['ssFilter']['filter_group']			= $ssFilter->filter_group;
		$this->_params['ssFilter']['filter_keyword_type']	= $ssFilter->filter_keyword_type;
		$this->_params['ssFilter']['filter_keyword_value']	= $ssFilter->filter_keyword_value;
		
		// PAGINATOR
		$this->_paginator['itemCountPerPage']	= 5;
		$this->_paginator['pageRange']			= 4;
		$this->_paginator['currentPageNumber']	= $this->params()->fromRoute('page',1);
		$this->_params['paginator']				= $this->_paginator;
		
		// OPTIONS
		$this->_options['tableName']	= 'Admin\Model\NestedTable';
		$this->_options['formName']		= 'formAdminUser';
		
		
		// DATA
		$this->_params['data']	= array_merge(
				$this->getRequest()->getPost()->toArray(),
				$this->getRequest()->getFiles()->toArray()
		);
	}
	
	// List category (ALL)
	public function index01Action() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		$nodes = $this->getTable()->listNodes();
		
		foreach ($nodes as $node) {
			$space	= str_repeat('------------|', $node->level - 1);
			$xhtml .= '<p>'.$space . ' ' . $node->name.'</p>';
		}
		echo $xhtml;
		return $this->getResponse();
	}
	
	// List category (LEVEL)
	public function index02Action() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		$nodes = $this->getTable()->listNodes(array('level' => 3), array('task' => 'list-level'));
	
		foreach ($nodes as $node) {
			$space	= str_repeat('------------|', $node->level - 1);
			$xhtml .= '<p>'.$space . ' ' . $node->name.'</p>';
		}
		echo $xhtml;
		return $this->getResponse();
	}
	
	// List category (BRANCH)
	public function index03Action() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		$nodes = $this->getTable()->listNodes(array('id' => 4), array('task' => 'list-branch'));
	
		foreach ($nodes as $node) {
			$space	= str_repeat('------------|', $node->level - 1);
			$xhtml .= '<p>'.$space . ' ' . $node->name.'</p>';
		}
		echo $xhtml;
		return $this->getResponse();
	
		/*
			* ------| Chuyên ngành
		* ------| Kinh tế
		* ------| ------| Danh nhân
		* ------| ------| Khởi nghiệp
		* ------| ------| Lãnh đạo
		* ------| ------| ------| Nhân sự
		* ------| Tạp chí
		* ------| ------| Sức khỏe
		* ------| ------| IT
		* ------| ------| ------| Echip
		* ------| Tiếng anh
		*/
	}
	
	// List category (BREADCRUMB)
	public function index04Action() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		$nodes = $this->getTable()->listNodes(array('id' => 12), array('task' => 'list-breadcrumd'));
	
		foreach ($nodes as $node) {
			$space	= str_repeat('------------|', $node->level - 1);
			$xhtml .= '<p>'.$space . ' ' . $node->name.'</p>';
		}
		echo $xhtml;
		return $this->getResponse();
	
	}
	
	// Insert node (RIGHT)
	public function index05Action() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		
		// Insert 
		$data	= array('name' => 'New', 'status' => 1);
		$nodeID	= 3;
		$options['position'] = 'right';
		//$nodes = $this->getTable()->insertNode($data, $nodeID, $options);
	
		// Print category
		$nodes = $this->getTable()->listNodes();
		foreach ($nodes as $node) {
			$space	= str_repeat('------------|', $node->level - 1);
			$xhtml .= '<p>'.$space . ' ' . $node->name.'</p>';
		}
		echo $xhtml;
		
		return $this->getResponse();
	}
	
	// Insert node (LEFT)
	public function index06Action() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	
		// Insert
		$data	= array('name' => 'New', 'status' => 1);
		$nodeID	= 3;
		$options['position'] = 'left';
		$nodes = $this->getTable()->insertNode($data, $nodeID, $options);
	
		// Print category
		$nodes = $this->getTable()->listNodes();
		foreach ($nodes as $node) {
			$space	= str_repeat('------------|', $node->level - 1);
			$xhtml .= '<p>'.$space . ' ' . $node->name.'</p>';
		}
		echo $xhtml;
	
		return $this->getResponse();
	}
	
	// Insert node (BEFORE)
	public function index07Action() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	
		// Insert
		$data	= array('name' => 'D', 'status' => 1);
		$nodeID	= 8;
		$options['position'] = 'right';
		$nodes = $this->getTable()->insertNode($data, $nodeID, $options);
	
		// Print category
		$nodes = $this->getTable()->listNodes();
		foreach ($nodes as $node) {
			$space	= str_repeat('------------|', $node->level - 1);
			$xhtml .= '<p>'.$space . ' ' . $node->name.'</p>';
		}
		echo $xhtml;
	
		return $this->getResponse();
	}
	
	// Insert node (AFTER)
	public function index08Action() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	
		// Insert
		$data	= array('name' => 'D2', 'status' => 1);
		$nodeID	= 5;
		$options['position'] = 'right';
		$nodes = $this->getTable()->insertNode($data, $nodeID, $options);
	
		// Print category
		$nodes = $this->getTable()->listNodes();
		foreach ($nodes as $node) {
			$space	= str_repeat('------------|', $node->level - 1);
			$xhtml .= '<p>'.$space . ' ' . $node->name.'</p>';
		}
		echo $xhtml;
	
		return $this->getResponse();
	}
	
	// Detach Branch
	public function index09Action() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	
		// Detach
		$nodes = $this->getTable()->detachBranch(3);
	
		// Print category
		$nodes = $this->getTable()->listNodes();
		foreach ($nodes as $node) {
			$space	= str_repeat('------------|', $node->level - 1);
			$xhtml .= '<p>'.$space . ' ' . $node->name.'</p>';
		}
		echo $xhtml;
	
		return $this->getResponse();
	}
	
	// Move node
	public function index10Action() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	
		// Detach
		$nodeMoveID			= 5;
		$nodeSelectionID	= 3;
		$options['position']= 'after';
		$this->getTable()->moveNode($nodeMoveID, $nodeSelectionID, $options);
	
		// Print category
		$nodes = $this->getTable()->listNodes();
		foreach ($nodes as $node) {
			$space	= str_repeat('------------|', $node->level - 1);
			$xhtml .= '<p>'.$space . ' ' . $node->name.'</p>';
		}
		echo $xhtml;
	
		return $this->getResponse();
	}
	
	// Move up / down
	public function index11Action() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	
		// Move up
		$this->getTable()->moveDown(4);
		
		// Print category
		$nodes = $this->getTable()->listNodes();
		foreach ($nodes as $node) {
			$space	= str_repeat('------------|', $node->level - 1);
			$xhtml .= '<p>'.$space . ' ' . $node->name.'</p>';
		}
		echo $xhtml;
	
		return $this->getResponse();
	}
	
	// Update node
	public function index12Action() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	
		// Move up
		$data	= array(
			'name'		=> 'Node B1',		
			'status'	=> 1,		
		);
		$nodeID			= 8;
		$nodeParentID	= 3;
		$this->getTable()->updateNode($data, $nodeID, $nodeParentID);
	
		// Print category
		$nodes = $this->getTable()->listNodes();
		foreach ($nodes as $node) {
			$space	= str_repeat('------------|', $node->level - 1);
			$xhtml .= '<p>'.$space . ' ' . $node->name.'</p>';
		}
		echo $xhtml;
	
		return $this->getResponse();
	}
	
	// Remove node
	public function index13Action() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	
		// Remove up
		$this->getTable()->removeNode(5, array('type' => 'only'));
	
		// Print category
		$nodes = $this->getTable()->listNodes();
		foreach ($nodes as $node) {
			$space	= str_repeat('------------|', $node->level - 1);
			$xhtml .= '<p>'.$space . ' ' . $node->name.'</p>';
		}
		echo $xhtml;
	
		return $this->getResponse();
	}

	// Ordering
	public function index14Action() {
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	
		// Print category
		$nodes = $this->getTable()->listNodes();
		
		foreach ($nodes as $node) {
			$childList[$node->parent][]	= $node->id;
			
			$ordering	= array_search($node->id, $childList[$node->parent]);
			$space		= str_repeat('------------|', $node->level - 1);
			$xhtml 		.= sprintf('<p>%s (%s) %s</p>', $space, $ordering + 1, $node->name);
		}
		
		echo $xhtml;
	
		return $this->getResponse();
	}
}






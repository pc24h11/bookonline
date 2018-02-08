<?php
namespace Admin\Model;

use Zend\Db\Sql\Expression;

use Zend\Db\Sql\Where;

use Zendvn\File\Image;

use PHPImageWorkshop\ImageWorkshop;

use Zendvn\File\Upload;

use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class NestedTable extends AbstractTableGateway {
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway	= $tableGateway;
	}
	
	public function insertNode($data, $nodeID, $options){
		$nodeInfo   = $this->getNodeInfo(array('id' => $nodeID));
		$dataLeft 	= array('left' => new Expression('(`left` + 2)'));
		$dataRight 	= array('right' => new Expression('(`right` + 2)'));
		$whereLeft	= new Where();
		$whereRight	= new Where();
		
		switch ($options['position']) {
			case 'left':
				$whereLeft->greaterThan('left', $nodeInfo->left);
				$whereRight->greaterThan('right', $nodeInfo->left);
				$data['parent']	= $nodeInfo->id;
				$data['level']	= $nodeInfo->level + 1;
				$data['left']	= $nodeInfo->left + 1;
				$data['right']	= $nodeInfo->left + 2;
				break;
			case 'before':
				$whereLeft->greaterThanOrEqualTo('left', $nodeInfo->left);
				$whereRight->greaterThan('right', $nodeInfo->left);
				$data['parent']	= $nodeInfo->parent;
				$data['level']	= $nodeInfo->level;
				$data['left']	= $nodeInfo->left;
				$data['right']	= $nodeInfo->left + 1;
				break;
			case 'after':
				$whereLeft->greaterThanOrEqualTo('left', $nodeInfo->right);
				$whereRight->greaterThan('right', $nodeInfo->right);
				$data['parent']	= $nodeInfo->parent;
				$data['level']	= $nodeInfo->level;
				$data['left']	= $nodeInfo->right + 1;
				$data['right']	= $nodeInfo->right + 2;
				break;
			case 'right':
			default:
				$whereLeft->greaterThan('left', $nodeInfo->right);
				$whereRight->greaterThanOrEqualTo('right', $nodeInfo->right);
				$data['parent']	= $nodeInfo->id;
				$data['level']	= $nodeInfo->level + 1;
				$data['left']	= $nodeInfo->right;
				$data['right']	= $nodeInfo->right + 1;
				break;
		}
		

		$this->tableGateway->update($dataLeft, $whereLeft);
		$this->tableGateway->update($dataRight, $whereRight);
		$this->tableGateway->insert($data);
	}
	
	public function listNodes($arrParam = null, $options = null){
		
		if($options == null) {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->columns(array('id','name','level', 'parent'))
					   ->order('left ASC')
					   ->where->greaterThan('level', 0);
				;	
			});
		}
		
		if($options['task'] == 'list-level') {
			echo '<h3 style="color:red;">' . __METHOD__ . '</h3>';
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->columns(array('id','name','level', 'parent'))
					   ->order('left ASC')
					   ->where->greaterThan('level', 0)
					   ->where->lessThanOrEqualTo('level', $arrParam['level'])
				;
			});
		}
		
		if($options['task'] == 'list-branch') {
			$nodeInfo	= $this->getNodeInfo($arrParam);
			$result	= $this->tableGateway->select(function (Select $select) use ($nodeInfo){
				$select->columns(array('id','name','level', 'parent'))
					   ->order('left ASC')
					   ->where->greaterThan('level', 0)
					   ->where->between('left',$nodeInfo->left,$nodeInfo->right)				   
				;
			});
			
		}
		
		if($options['task'] == 'list-breadcrumd') {
			$nodeInfo	= $this->getNodeInfo($arrParam);
			$result	= $this->tableGateway->select(function (Select $select) use ($nodeInfo){
				$select->columns(array('id','name','level', 'parent'))
					   ->order('left ASC')
					   ->where->greaterThan('level', 0)
					   ->where->lessThanOrEqualTo('left', $nodeInfo->left)
					   ->where->greaterThanOrEqualTo('right', $nodeInfo->right)
				;
			});
					
		}
		
		if($options['task'] == 'list-childs') {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->columns(array('id','name','level'))
					   ->order('left ASC')
						->where->equalTo('parent', $arrParam->id)
				;
			});
					
		}
		
		if($options['task'] == 'move-up') {
			$nodeInfo	= $this->getNodeInfo($arrParam);
			
			$result	= $this->tableGateway->select(function (Select $select) use ($nodeInfo){
				$select->columns(array('id','name','level','left', 'right', 'parent'))
					   ->order('left DESC')
					   ->limit(1)
					   ->where->lessThan('right', $nodeInfo->left)
					   ->where->notEqualTo('id', $nodeInfo->id)
					   ->where->equalTo('parent', $nodeInfo->parent);
				;
			})->current();
		}
		
		if($options['task'] == 'move-down') {
			$nodeInfo	= $this->getNodeInfo($arrParam);
				
			$result	= $this->tableGateway->select(function (Select $select) use ($nodeInfo){
				$select->columns(array('id','name','level','left', 'right', 'parent'))
						->order('left ASC')
						->limit(1)
						->where->greaterThan('left', $nodeInfo->right)
						->where->notEqualTo('id', $nodeInfo->id)
						->where->equalTo('parent', $nodeInfo->parent);
				;
			})->current();
		}
		
		return $result;
	}
	
	public function getNodeInfo($arrParam = null, $options = null){
	
		if($options == null) {
			$result	= $this->tableGateway->select(function (Select $select) use ($arrParam){
				$select->columns(array('id','name','level','left', 'right', 'parent'))
					  ->where->equalTo('id', $arrParam['id']);
				;
			})->current();
		}
		
		return $result;
	}
	
	public function detachBranch($nodeMoveID, $options = null){
		$moveInfo	= $this->getNodeInfo(array('id' => $nodeMoveID));
		$moveLeft	= $moveInfo->left;
		$moveRight	= $moveInfo->right;
		$totalNode	= ($moveRight - $moveLeft + 1)/2;
		
		// ================================== Node on branch ==================================
		if($options == null){
			$data 	= array(
					'left' 	=> new Expression('`left` - ?', array($moveLeft)),
					'right' => new Expression('`right` - ?', array($moveRight))
			);
			$where	= new Where();
			$where->between('left', $moveInfo->left, $moveInfo->right);
			$this->tableGateway->update($data, $where);
		}
		
		if($options['task'] == 'remove-node'){
			$where	= new Where();
			$where->between('left', $moveInfo->left, $moveInfo->right);
			$this->tableGateway->delete($where);
		}
		
		// ================================== Node on tree (LEFT) ==================================
		$data = array(
				'left' 	=> new Expression('`left` - ?', array($totalNode * 2)),
		);
		$where = new Where();
		$where->greaterThan('left', $moveRight);
		$this->tableGateway->update($data, $where);
		
		// ================================== Node on tree (RIGHT) ==================================
		$data = array(
				'right' 	=> new Expression('`right` - ?', array($totalNode * 2)),
		);
		$where = new Where();
		$where->greaterThan('right', $moveInfo->right);
		$this->tableGateway->update($data, $where);
		
		return $totalNode;
	}

	public function moveNode($nodeMoveID, $nodeSelectionID, $options){
		switch ($options['position']) {
			case 'left':
				$this->moveLeft($nodeMoveID, $nodeSelectionID);
				break;
			case 'before':
				$this->moveBefore($nodeMoveID, $nodeSelectionID);
				break;
			case 'after':
				$this->moveAfter($nodeMoveID, $nodeSelectionID);
				break;
			case 'right':
			default:
				$this->moveRight($nodeMoveID, $nodeSelectionID);
			break;
		}
		
	}
	
	public function moveRight($nodeMoveID, $nodeSelectionID){
		// ========================= Detach branch =========================
		$totalNode	= $this->detachBranch($nodeMoveID);
		
		$nodeSelectionInfo	= $this->getNodeInfo(array('id' => $nodeSelectionID));
		$nodeMoveInfo		= $this->getNodeInfo(array('id' => $nodeMoveID));
		
		// ========================= Node on tree (LEFT) ========================= 
		$data 	= array(
				'left' 	=> new Expression('`left` + ?', array($totalNode * 2))
		);
		$where	= new Where();
		$where->greaterThan('left', $nodeSelectionInfo->right);
		$where->greaterThan('right', 0);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node on tree (RIGHT) =========================
		$data 	= array(
				'right' 	=> new Expression('`right` + ?', array($totalNode * 2))
		);
		$where	= new Where();
		$where->greaterThanOrEqualTo('right', $nodeSelectionInfo->right);
		$this->tableGateway->update($data, $where);
				
		// ========================= Node on branch (LEVEL) =========================
		$where	= new Where();
		$where->lessThanOrEqualTo('right', 0);
		
		$data 	= array(
				'level' 	=> new Expression('`level` + ?', array($nodeSelectionInfo->level - $nodeMoveInfo->level + 1))
		);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node on branch (LEFT) =========================		
		$data 	= array(
				'left' 	=> new Expression('`left` + ?', array($nodeSelectionInfo->right))
		);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node on branch (RIGHT) =========================
		$data 	= array(
				'right' 	=> new Expression('`right` + ?', array($nodeSelectionInfo->right + $totalNode*2 - 1))
		);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node move (PARENT) =========================
		$data 	= array(
				'parent' 	=> $nodeSelectionInfo->id
		);
		$this->tableGateway->update($data, array('id' => $nodeMoveInfo->id));
	}
	
	public function moveLeft($nodeMoveID, $nodeSelectionID){
		
		// ========================= Detach branch =========================
		$totalNode	= $this->detachBranch($nodeMoveID);
		
		$nodeSelectionInfo	= $this->getNodeInfo(array('id' => $nodeSelectionID));
		$nodeMoveInfo		= $this->getNodeInfo(array('id' => $nodeMoveID));
		
		// ========================= Node on tree (LEFT) ========================= data + where -
		$data 	= array(
				'left' 	=> new Expression('`left` + ?', array($totalNode * 2))
		);
		$where	= new Where();
		$where->greaterThan('left', $nodeSelectionInfo->left);
		$where->greaterThan('right', 0);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node on tree (RIGHT) ========================= data + where -
		$data 	= array(
				'right' 	=> new Expression('`right` + ?', array($totalNode * 2))
		);
		$where	= new Where();
		$where->greaterThan('right', $nodeSelectionInfo->left);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node on branch (LEVEL) ========================= data + where +
		$where	= new Where();
		$where->lessThanOrEqualTo('right', 0);
		
		$data 	= array(
				'level' 	=> new Expression('`level` + ?', array($nodeSelectionInfo->level - $nodeMoveInfo->level + 1))
		);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node on branch (LEFT) ========================= data - where +
		$data 	= array(
				'left' 	=> new Expression('`left` + ?', array($nodeSelectionInfo->left + 1))
		);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node on branch (RIGHT) ========================= data - where +
		$data 	= array(
				'right' 	=> new Expression('`right` + ?', array($nodeSelectionInfo->left + 1 + $totalNode*2 - 1))
		);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node move (PARENT) ========================= data + where +
		$data 	= array(
				'parent' 	=> $nodeSelectionInfo->id
		);
		$this->tableGateway->update($data, array('id' => $nodeMoveInfo->id));
		
	}
	
	public function moveBefore($nodeMoveID, $nodeSelectionID){
		// ========================= Detach branch =========================
		$totalNode	= $this->detachBranch($nodeMoveID);
		
		$nodeSelectionInfo	= $this->getNodeInfo(array('id' => $nodeSelectionID));
		$nodeMoveInfo		= $this->getNodeInfo(array('id' => $nodeMoveID));
		
		// ========================= Node on tree (LEFT) ========================= data + where -
		$data 	= array(
				'left' 	=> new Expression('`left` + ?', array($totalNode * 2))
		);
		$where	= new Where();
		$where->greaterThanOrEqualTo('left', $nodeSelectionInfo->left);
		$where->greaterThan('right', 0);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node on tree (RIGHT) ========================= data + where -
		$data 	= array(
				'right' 	=> new Expression('`right` + ?', array($totalNode * 2))
		);
		$where	= new Where();
		$where->greaterThan('right', $nodeSelectionInfo->left);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node on branch (LEVEL) ========================= data - where +
		$where	= new Where();
		$where->lessThanOrEqualTo('right', 0);
		
		$data 	= array(
				'level' 	=> new Expression('`level` + ?', array($nodeSelectionInfo->level - $nodeMoveInfo->level))
		);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node on branch (LEFT) ========================= data - where +
		$data 	= array(
				'left' 	=> new Expression('`left` + ?', array($nodeSelectionInfo->left))
		);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node on branch (RIGHT) ========================= data - where +
		$data 	= array(
				'right' 	=> new Expression('`right` + ?', array($nodeSelectionInfo->left + $totalNode*2 - 1))
		);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node move (PARENT) ========================= data + where +
		$data 	= array(
				'parent' 	=> $nodeSelectionInfo->parent
		);
		$this->tableGateway->update($data, array('id' => $nodeMoveInfo->id));
	}
	
	public function moveAfter($nodeMoveID, $nodeSelectionID){
		// ========================= Detach branch =========================
		$totalNode	= $this->detachBranch($nodeMoveID);
		
		$nodeSelectionInfo	= $this->getNodeInfo(array('id' => $nodeSelectionID));
		$nodeMoveInfo		= $this->getNodeInfo(array('id' => $nodeMoveID));
		
		// ========================= Node on tree (LEFT) ========================= data + where -
		$data 	= array(
				'left' 	=> new Expression('`left` + ?', array($totalNode * 2))
		);
		$where	= new Where();
		$where->greaterThan('left', $nodeSelectionInfo->right);
		$where->greaterThan('right', 0);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node on tree (RIGHT) ========================= data + where -
		$data 	= array(
				'right' 	=> new Expression('`right` + ?', array($totalNode * 2))
		);
		$where	= new Where();
		$where->greaterThan('right', $nodeSelectionInfo->right);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node on branch (LEVEL) ========================= data - where +
		$where	= new Where();
		$where->lessThanOrEqualTo('right', 0);
		
		$data 	= array(
				'level' 	=> new Expression('`level` + ?', array($nodeSelectionInfo->level - $nodeMoveInfo->level))
		);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node on branch (LEFT) ========================= data - where +
		$data 	= array(
				'left' 	=> new Expression('`left` + ?', array($nodeSelectionInfo->right + 1))
		);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node on branch (RIGHT) ========================= data - where +
		$data 	= array(
				'right' 	=> new Expression('`right` + ?', array($nodeSelectionInfo->right + $totalNode*2))
		);
		$this->tableGateway->update($data, $where);
		
		// ========================= Node move (PARENT) ========================= data + where +
		$data 	= array(
				'parent' 	=> $nodeSelectionInfo->parent
		);
		$this->tableGateway->update($data, array('id' => $nodeMoveInfo->id));
	}

	public function moveUp($nodeID, $options = null){
		$nodeSelection	= $this->listNodes(array('id' => $nodeID), array('task' => 'move-up'));
		if(!empty($nodeSelection)) $this->moveBefore($nodeID, $nodeSelection->id);
	}

	public function moveDown($nodeID, $options = null){
		$nodeSelection	= $this->listNodes(array('id' => $nodeID), array('task' => 'move-down'));
		if(!empty($nodeSelection)) $this->moveAfter($nodeID, $nodeSelection->id);
	}

	public function updateNode($data, $nodeID, $nodeParentID = null, $options = null){
		if(!empty($nodeParentID)){
			$nodeParentInfo	= $this->getNodeInfo(array('id' => $nodeParentID));
			$nodeInfo		= $this->getNodeInfo(array('id' => $nodeID));
			if(!empty($nodeParentInfo) && $nodeInfo->parent != $nodeParentInfo->id) {
				$this->moveRight($nodeID, $nodeParentID);
			}
		}
		
		$this->tableGateway->update($data, array('id' => $nodeID ));
	}
	
	public function removeNode($nodeID, $options){
		switch ($options['type']) {
			case 'only':
				$this->removeNodeOnly($nodeID);
				break;
			case 'branch':
			default:
				$this->removeBranch($nodeID);
				break;
		}
		
	}
	
	public function removeBranch($nodeID){
		$this->detachBranch($nodeID, array('task' => 'remove-node') );
	}
	
	public function removeNodeOnly($nodeID){
		$nodeInfo	= $this->getNodeInfo(array('id' => $nodeID));
		$nodes		= $this->listNodes($nodeInfo, array('task' => 'list-childs'));
		
		if(!empty($nodes)){
			foreach ($nodes as $node){
				$this->moveRight($node->id, $nodeInfo->parent);
			}
		}
		
		$this->removeBranch($nodeID);
	}
	
}









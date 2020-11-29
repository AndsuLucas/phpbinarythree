<?php
class Node
{
    private $value;
    private $left = null;
    private $right = null;

    public function __construct(int $value)
    {
       $this->value = $value;
    }
	
    public function getValue()
    {
	return $this->value;
    }

    public function insert(Node $node)
    {
    	if ($node->getValue() == $this->value) {
           return;
        }

	if ($node->getValue() > $this->value) {
	    $this->insertRight($node);
            return;
	}
        
        $this->insertLeft($node);
        
    }
    
    private function insertRight(Node $node)
    {
    	if (is_null($this->right)) {
	   $this->right = $node;
           return;
	}
            
        $this->left->insert($node);
    }
    
    private function insertLeft(Node $node)
    {
    	if (is_null($this->left)) {
	    $this->left = $node;
            return;
	}
            
        $this->left->insert($node);
    }
    
    public function getNodeThree(&$value)
    {	
        $value[] = $this->value;	
   
        if (!is_null($this->right)) {
            $this->right->getNodeThree($value);
        }

        if (!is_null($this->left)) {
            $this->left->getNodeThree($value);
        }  
    }
  
    
    private function isRoot()
    {
    	return is_null($this->left) && is_null($this->right);
    }
   
}

$principalNode = new Node(9);
$principalNode->insert(new Node(10));
$principalNode->insert(new Node(3));
$principalNode->getNodeThree($value);
var_dump($value);

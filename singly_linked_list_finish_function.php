<?php 
	// Class for nodes 
	class Node{
		public function __construct($value)
		{
			$this->value = $value; 
			$this->next = null; 
		}
	}
	// Class for list that will contain the nodes 
	class SinglyLinkedList{
		public function __construct()
		{
			$this->head = null; 
		}
		public function add($val)
		{
			//returns true if added correctly

			//check to see if there is not a head because then  a head node can be created 
			if($this->head == null)
			{
				//point head to the new node 
				$this->head = new Node($val);
			}
			else 
			{
				//we have a head lets navigate through the Linked List till we get the end 
				//when we reach the end we can add the new node there

				//temp to help us navigate the linked list.
				$current = $this->head;
				//while loops are extremely skilled at looping through a linked list
				while($current->next)
				{
					//move our pointer forward to the next node 
					$current = $current->next; 
				}
				//we reched the end! time to add the new node to the end 
				$current->next = new Node($val);
			}
		}
		public function remove($val)
		{
			//lets start by checking if the node we want to remove is the head
			if($this->head->value == $val)
			{
				//its the head! lets change the header pointer
				$this->head = $this->head->next;
			}
			else 
			{
				//lets find the node and make sure we dont hit the end of the node list
				$current = $this->head;
				while($current->next->value != $val && $current->next)
				{
					//move our pointer forward
					$current = $current->next;
				}
				// we either made it to the end or found our node, either way we can change teh pointers!
				//create a temp to hold onto whatever is ahead of the node we found
				$temp = $current->next->next;
				//now set our current node's next to the node thats on the other side of the node we want to remove
				$current->next = $temp; 

			}
		}
		public function find($val)
		{
			//start by setting a temp that will navigate the whole Linked List 
			$current = $this->head;
			//start traversing the linked list
			while($current != null)
			{
				//lets check to see if the current node we are at is the one we are trying to find
				if($current->value == $val)
				{
					//one exists, return the node!
					return $current;
				}
				$current = $current->next;
			}
			// this means our while loop broke meaning we ran out of nodes to check, return false
			return false;
		}
		public function printValues()
		{
			//we have to travers the list and echo out all the values. Lets star traversing
			$current = $this->head;
			while($current)
			{
				//echo out the values
				echo $current->value.'<br>';
				$current = $current->next;
			}
			//we're done printing
		}
		# ------------- new functions to add ----------------------------- #
		public function insert($valueAfter, $newValue)
		 {
		  	//return true if successfully inserted after the valueAfter
		  	//if value is never found add the new value to the end of the linked list
		 	# Set '$current' to head object of linked list 
		 	$current = $this->head; 
		 	if($current->value == $valueAfter)
		 	{
		 		$temp = $current->next; 
		 		$current->next = new node($newValue);
		 		$current->next->next = $temp;
		 		return true; 
		 	} 
		 	else 
		 	{
		 		while($current->next && $current->next->value != $valueAfter)
		 		{
		 			$current = $current->next; 
		 		}
		 		if($current->next != null)
		 		{
		 			$current = $current->next; 
		 			$temp = $current->next; 
		 			$current->next = new node($newValue);
		 			$current->next->next = $temp;
		 			return true;
		 		}
		 		else 
		 		{
		 			# Add '$newValue' parameter at the end of the linked list 
		 			# if '$valueAfter' parameter is not located. 
		 			$current->next = new node($newValue);
		 		}
		 	}
		}
		public function isEmpty()
		{
		  	//return true if the linked list is empty
		  	//return false if linked list has nodes
		 	if($this->head)
		 	{
		 		return true; 
		 	} 
		 	else 
		 	{
		 		return false; 
		 	}
		}
		public function removeDups($val)
		{
		   	//return true if all values were removed
		 	if($this->head->value == null && $this->head->next == null)
		 	{
		 		return true; 
		 	}
		 	else 
		 	{
		 		return false; 
		 	}
		}
	}
	// create new linked List Object 
	$newList = new SinglyLinkedList();
	//set the Linked list head to a new node
	$newList->head = new Node(1);
	$newList->head->next = new Node(2);
	$newList->head->next->next = new Node(3);
	$newList->head->next->next->next = new Node(4);
	$newList->head->next->next->next->next = new Node(5);
	$newList->head->next->next->next->next->next = new Node(6);
	// var_dump($newList);

	// //now we can execute our new function to add nodes to a linked list!
	// $newList2 = new SinglyLinkedList();
	// $newList2->add(1);
	// $newList2->add(2);
	// $newList2->add(3);
	// $newList2->add(4);
	// $newList2->add(5);
	// var_dump($newList2);

	// $newList->remove(1);
	// $newList->remove(3); 
	// $newList->remove(5);
	$newList->insert(9, 'New inserted value');
	$newList->printValues(); 
 ?>


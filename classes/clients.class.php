<?php
class Client {

    private $cliid;
    private $cliactive;
    private $clinom;
    private $cliadr;
    private $clicp;
    private $cliville;
    private $cliurl;
    private $clitel;
    private $cliemail;


    public function __construct() {
		$this->cliactive = 1;
    }

	//function to fetch client
	public function loadClientFromID($cliid)
    {

        //if ($result = __FETCH("SELECT * FROM clients WHERE cliid = '{$cliid}'")) {
        if ($result = __FETCH('SELECT * FROM clients WHERE cliid = '.(int)$cliid)) {
            // Populate the user object with data from the database
            $this->cliid = $result['cliid'];
            $this->cliactive = $result['cliactive'];
            $this->clinom = $result['clinom'];
            $this->cliadr = $result['cliadr'];
            $this->clicp = $result['clicp'];
            $this->cliville = $result['cliville'];
            $this->cliurl = $result['cliurl'];
            $this->clitel = $result['clitel'];
            $this->cliemail = $result['cliemail'];

            return true;
        }

        return false; // client not found
    }

	// Function to delete user
	public function deleteClient(){
		__QUERY('DELETE FROM clients WHERE cliid=' . $this->cliid);
        return __AFFECTED();
	}


	public function getCliid() {
		return $this->cliid;
	}
	// Function to add clients
	public function newClientRecord()
    {

        __QUERY('INSERT INTO clients 
		(cliid)
		VALUES 
		(NULL)');
		$id = __INSERT_ID();
		return $this->loadClientFromID($id);
    }

	public function setCliactive($cliactive): self {
		$this->cliactive = $cliactive;
		__QUERY('UPDATE clients SET cliactive='.(int)$cliactive.' WHERE cliid='.$this->cliid);
		return $this;
	}

	public function getClinom() {
		return $this->clinom;
	}

	public function setClinom($clinom): self {
		$this->clinom = $clinom;
		__QUERY('UPDATE clients SET clinom="'.__STRING($clinom).'" WHERE cliid='.$this->cliid);
		return $this;
	}


	public function getCliadr() {
		return $this->cliadr;
	}
	

	public function setCliadr($cliadr) {
		$this->cliadr = $cliadr;
		__QUERY('UPDATE clients SET cliadr = "'. __STRING($cliadr) . '" WHERE cliid = ' . $this->cliid);
		return $this;
	}
	


	public function getClicp() {
		return $this->clicp;
	}
	

	public function setClicp($clicp): self {
		$this->clicp = $clicp;
		__QUERY('UPDATE clients SET clicp="'.__STRING($clicp).'" WHERE cliid='.$this->cliid);
		return $this;
	}


	public function getCliville() {
		return $this->cliville;
	}
	
	public function setCliville($cliville): self {
		$this->cliville = $cliville;
		__QUERY('UPDATE clients SET cliville="'.__STRING($cliville).'" WHERE cliid='.$this->cliid);
		return $this;
	}


	public function getCliurl() {
		return $this->cliurl;
	}
	
	public function setCliurl($cliurl): self {
		$this->cliurl = $cliurl;
		__QUERY('UPDATE clients SET cliurl="'.__STRING($cliurl).'" WHERE cliid='.$this->cliid);
		return $this;
	}

	public function getClitel() {
		return $this->clitel;
	}
	
	public function setClitel($clitel): self {
		$this->clitel = $clitel;
		__QUERY('UPDATE clients SET clitel="'.__STRING($clitel).'" WHERE cliid='.$this->cliid);
		return $this;
	}

	public function getCliemail() {
		return $this->cliemail;
	}
	
	public function setCliemail($cliemail): self {
		$this->cliemail = $cliemail;
		__QUERY('UPDATE clients SET cliemail="'.__STRING($cliemail).'" WHERE cliid='.$this->cliid);
		return $this;
	}
}

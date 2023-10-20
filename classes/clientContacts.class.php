<?php
class ClientContacts {
    private $cctid;
    private $cctactive;
    private $cctcli;
    private $cctcivilite;
    private $cctprenom;
    private $cctnom;
    private $cctfixe;
    private $cctportable;
    private $cctemail;
    private $cctpassword;

    public function __construct($id=null) {
		if ($id != null) $this->loadFromcctID($id);

		$this->cctactive = 1;

    }

	public function loadFromcctID($cctid)
    {
        if ($result = __FETCH("SELECT * FROM clients_contacts WHERE cctid = '{$cctid}'")) {
            // Populate the clientContact object with data from the database
            $this->cctid = $result['cctid'];
			$this->cctactive = $result['cctactive'];
            $this->cctcli = $result['cctcli'];
            $this->cctcivilite = $result['cctcivilite'];
            $this->cctprenom = $result['cctprenom'];
            $this->cctnom = $result['cctnom'];
            $this->cctfixe = $result['cctfixe'];
            $this->cctportable = $result['cctportable'];
            $this->cctemail = $result['cctemail'];
            $this->cctpassword = $result['cctpassword'];

            return true;
        }

        return false; // clientContact not found
    }




	public function getCctid() {
		return $this->cctid;
	}
	
	
	public function setCctid($cctid): self {
		$this->cctid = $cctid;
		return $this;
	}


	public function getCctactive() {
		return $this->cctactive;
	}
	

	public function setCctactive($cctactive): self {
		$this->cctactive = $cctactive;
		return $this;
	}


	public function getCctcli() {
		return $this->cctcli;
	}
	

	public function setCctcli($cctcli): self {
		$this->cctcli = $cctcli;
		return $this;
	}


	public function getCctcivilite() {
		return $this->cctcivilite;
	}
	

	public function setCctcivilite($cctcivilite): self {
		$this->cctcivilite = $cctcivilite;
		return $this;
	}


	public function getCctprenom() {
		return $this->cctprenom;
	}
	

	public function setCctprenom($cctprenom): self {
		$this->cctprenom = $cctprenom;
		return $this;
	}


	public function getCctnom() {
		return $this->cctnom;
	}
	

	public function setCctnom($cctnom): self {
		$this->cctnom = $cctnom;
		return $this;
	}

	public function getCctfixe() {
		return $this->cctfixe;
	}
	
	public function setCctfixe($cctfixe): self {
		$this->cctfixe = $cctfixe;
		return $this;
	}

	public function getCctportable() {
		return $this->cctportable;
	}
	
	public function setCctportable($cctportable): self {
		$this->cctportable = $cctportable;
		return $this;
	}


	public function getCctemail() {
		return $this->cctemail;
	}
	
	
	public function setCctemail($cctemail): self {
		$this->cctemail = $cctemail;
		return $this;
	}


	public function getCctpassword() {
		return $this->cctpassword;
	}
	
	
	public function setCctpassword($cctpassword): self {
		$this->cctpassword = $cctpassword;
		return $this;
	}
}
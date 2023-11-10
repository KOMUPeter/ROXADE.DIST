<?php

class Tickets {
    private $ticid;
    private $ticcli;
    private $ticcct;
    private $ticdt;
    private $tictype;
    private $ticniveau;
    private $tictitre;
    private $ticdescriptif;
    private $ticpec;
    private $ticpecdt;
	private $ticpecus;
    private $ticpecuse;
    private $ticend;
    private $ticenddt;
    private $ticendus;

    public function __construct($id = null) {
		$this->ticcli = 0;
		$this->ticcct = 0;
        $this->ticpec = 0;
		$this->tictype = 'E';
        if ($id != null) $this->loadFromID($id);
    }

	public function newRecord($client,$contact,$demande, $niveau , $titre , $descriptif)
    {
        __QUERY('INSERT INTO tickets (ticcli,ticcct,tictype, ticniveau , tictitre , ticdescriptif ) VALUES ('.(int)$client.','.(int)$contact.',"' . __STRING($demande) . '","' . __STRING($niveau) . '","' . __STRING($titre) . '","' . __STRING($descriptif) . '")');
        $this->loadFromID(__INSERT_ID());
    }

	public function priseEnCharge($ticpecus,$ticpecuse) {
		$this->ticpec = 1 ; 
		$this->ticpecdt = time() ;
		$this->ticpecus = $ticpecus;
		$this->ticpecuse = (int)$ticpecuse;
		
		__QUERY( 'UPDATE tickets SET ticpec = 1 , ticpecdt = NOW() , ticpecus = "'. __STRING($ticpecus).'",  ticpecuse = ' . (int)$ticpecuse . ' WHERE ticid = ' . $this->ticid );
		return(__AFFECTED());
	}

	public function nonPriseEnCharge($ticpecus,$ticpecuse) {
		$this->ticpec = 0 ; 
		$this->ticpecdt = time() ;
		
		__QUERY( 'UPDATE tickets SET ticpec = 0 , ticpecdt = NOW() WHERE ticid = ' . $this->ticid );
		return(__AFFECTED());
	}
	
	
	public function loadFromID($ticid)
    {

        if ($result = __FETCH("SELECT * FROM tickets WHERE ticid = '{$ticid}'")) {
            // Populate the user object with data from the database
            $this->ticid = $result['ticid'];
            $this->ticcli = $result['ticcli'];
            $this->ticcct = $result['ticcct'];
            $this->ticdt = $result['ticdt'];
            $this->tictype = $result['tictype'];
            $this->ticniveau = $result['ticniveau'];
            $this->tictitre = $result['tictitre'];
            $this->ticdescriptif = $result['ticdescriptif'];
            $this->ticpec = $result['ticpec'];
            $this->ticpecdt = $result['ticpecdt'];
            $this->ticpecuse = $result['ticpecuse'];

            return true;
        }

        return false; // ticket not found
    }


	public function getTicid() {
		return $this->ticid;
	}
	
	public function setTicid($ticid): self {
		$this->ticid = $ticid;
		return $this;
	}

	public function getTiccli() {
		return $this->ticcli;
	}

	public function getClientNom(){
		$client = new Client($this->ticcli);
		return ($client->getClinom());
	}
	
	public function setTiccli($ticcli): self {
		$this->ticcli = $ticcli;
		return $this;
	}

	public function getTiccct() {
		return $this->ticcct;
	}
	
	public function setTiccct($ticcct): self {
		$this->ticcct = $ticcct;
		return $this;
	}

	public function getContactNom(){
		$contact = new ClientContacts($this->ticcct);
		return ($contact->getCctprenom().' '.$contact->getCctnom());
	}
	public function getTicdt() {
		return $this->ticdt;
	}
	
	public function setTicdt($ticdt): self {
		$this->ticdt = $ticdt;
		return $this;
	}

	public function getTictype() {
		return $this->tictype;
	}
	
	public function setTictype($tictype): self {
		$this->tictype = $tictype;
		return $this;
	}

	public function getTicniveau() {
		return $this->ticniveau;
	}
	
	public function setTicniveau($ticniveau): self {
		$this->ticniveau = $ticniveau;
		return $this;
	}

	public function getTictitre() {
		return $this->tictitre;
	}
	
	public function setTictitre($tictitre): self {
		$this->tictitre = $tictitre;
		return $this;
	}

	public function getTicdescriptif() {
		return $this->ticdescriptif;
	}
	
	public function setTicdescriptif($ticdescriptif): self {
		$this->ticdescriptif = $ticdescriptif;
		return $this;
	}

	public function getTicpec() {
		return $this->ticpec;
	}
	
	public function setTicpec($ticpec): self {
		$this->ticpec = $ticpec;
		return $this;
	}

	public function getTicpecdt() {
		return $this->ticpecdt;
	}
	
	public function setTicpecdt($ticpecdt): self {
		$this->ticpecdt = $ticpecdt;
		return $this;
	}

	public function getTicpecuse() {
		return $this->ticpecuse;
	}
	
	public function setTicpecuse($ticpecuse): self {
		$this->ticpecuse = $ticpecuse;
		return $this;
	}

	public function getBadgeType() {
		if ($this->tictype == 'E') {
			return ('<div class="badge badge-primary">EVO</div>');
		}
		if ($this->tictype == 'B') {
			return ('<div class="badge badge-danger">BUG</div>');
		}
	}

	public function getBagdeNiveau() {
		$s = '<div class="badge badge-';
		if ($this->ticniveau == 1) $s .= "primary";
		if ($this->ticniveau == 2) $s .= "warning";
		if ($this->ticniveau == 3) $s .= "danger";
		$s .= '">'.$this->ticniveau.'</div>';
		return ($s);
	}

	public function getIconePEC() {
		if ($this->ticpec == 0 ) {
			return ('<i class="fa fa-hourglass text-danger"></i>');
		}
		if ($this->ticpec == 1) {
			return ('<i class="fa fa-check-circle text-success"></i>');
		}
	}


	public function getTicpecus() {
		return $this->ticpecus;
	}
	
	
	public function setTicpecus($ticpecus): self {
		$this->ticpecus = $ticpecus;
		return $this;
	}


	public function getTicend() {
		return $this->ticend;
	}

	public function setTicend($ticend): self {
		$this->ticend = $ticend;
		return $this;
	}

	public function getTicenddt() {
		return $this->ticenddt;
	}
	

	public function setTicenddt($ticenddt): self {
		$this->ticenddt = $ticenddt;
		return $this;
	}


	public function getTicendus() {
		return $this->ticendus;
	}

	public function setTicendus($ticendus): self {
		$this->ticendus = $ticendus;
		return $this;
	}
}
<?php

class Application
{
	private $toaid;
	private $toatype;
	private $toatitle;
	private $toatexte;

	public function __construct()
	{
        /*
         * Initialisation de la variable de session pour la gestion des toasts
         */
        if (!isset($_SESSION['toasts'])) $_SESSION['toasts'] = array();
	}

    /*
     * Fonctions Xavier
     */
    public function addToast($type, $titre, $message)
    {
        $_SESSION['toasts'][] = array(
            "type" => $type,
            "titre" => $titre,
            "message" => $message
        );
    }

    
    /*
     * Fin fonction Xavier
     */


	public function getToaid()
	{
		return $this->toaid;
	}


	public function setToaid($toaid)
	{
		$this->toaid = $toaid;
		return $this;
	}

	public function getToatype()
	{
		return $this->toatype;
	}


	public function setToatype($toatype): self
	{
		// update toatype if needed
		__QUERY('UPDATE toasts SET toatype="' . __STRING($toatype) . '" WHERE toaid=' . $this->toaid);
		$this->toatype = $toatype;
		return $this;
	}


	public function getToatitle()
	{
		return $this->toatitle;
	}


	public function setToatitle($toatitle): self
	{
		// update toatitle if needed
		__QUERY('UPDATE toasts SET toatitle="' . __STRING($toatitle) . '" WHERE toaid=' . $this->toaid);
		$this->toatitle = $toatitle;
		return $this;
	}


	public function getToatexte()
	{
		return $this->toatexte;
	}


	public function setToatexte($toatexte): self
	{
		// update toatexte if needed
		__QUERY('UPDATE toasts SET toatexte="' . __STRING($toatexte) . '" WHERE toaid=' . $this->toaid);
		$this->toatexte = $toatexte;
		return $this;
	}
}

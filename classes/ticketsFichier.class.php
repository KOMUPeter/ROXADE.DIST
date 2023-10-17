<?php
class TicketFichiers
{
    private $tifid;
    private $tiftic;
    private $ticke;
    private $tifname;
    private $tiftype;
    private $tifsiz;


    public function __construct($tifid = null, $tiftic = null, $ticke = null, $tifname = null, $tiftype = null, $tifsiz = null)
    {
        $this->tifid = $tifid;
        $this->tiftic = $tiftic;
        $this->ticke = $ticke;
        $this->tifname = $tifname;
        $this->tiftype = $tiftype;
        $this->tifsiz = $tifsiz;
    }

    public function getTifid()
    {
        return $this->tifid;
    }


    public function setTifid($tifid): self
    {
        $this->tifid = $tifid;
        return $this;
    }

    public function getTiftic()
    {
        return $this->tiftic;
    }

    public function setTiftic($tiftic): self
    {
        $this->tiftic = $tiftic;
        return $this;
    }


    public function getTicke()
    {
        return $this->ticke;
    }


    public function setTicke($ticke): self
    {
        $this->ticke = $ticke;
        return $this;
    }

    public function getTifname()
    {
        return $this->tifname;
    }


    public function setTifname($tifname): self
    {
        $this->tifname = $tifname;
        return $this;
    }


    public function getTiftype()
    {
        return $this->tiftype;
    }


    public function setTiftype($tiftype): self
    {
        $this->tiftype = $tiftype;
        return $this;
    }

    public function getTifsiz()
    {
        return $this->tifsiz;
    }


    public function setTifsiz($tifsiz): self
    {
        $this->tifsiz = $tifsiz;
        return $this;
    }
}
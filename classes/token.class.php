<?php

namespace classes;

class token
{
    private $tokcode;
    private $tokstart;
    private $tokend;
    private $tokuse;
    private $tokip;
    private $toknav;

    public function __construct()
    {

    }

    public function LoadToken($tokcode)
    {
        global $databaseLink;

        $id = $tokcode;
        $query = "SELECT * FROM users WHERE tokcode = '{$id}'";
        $result = __FETCH($query);

        if ($result) {
            $this->tokcode = $result['$tokcode'];
            $this->tokstart = $result['$tokstart'];
            $this->tokend = $result['$tokend'];
            $this->tokuse = $result['$tokuse'];
            $this->tokip = $result['$tokip'];
            $this->toknav = $result['$toknav'];

            return true;
        }
        return false; // token non trouver.
    }

    public function getTokcode()
    {
        return ($this->tokcode);
    }

    public function getTokstart()
    {
        return ($this->tokstart);
    }

    public function getTokend()
    {
        return ($this->tokend);
    }
    public function getTokuse()
    {
        return ($this->tokuse);
    }

    public function getTokip()
    {
        return ($this->tokip);
    }

    public function getToknav()
    {
        return ($this->toknav);
    }

    // public function setTokcode(int $tokcode)
    // {
    //     $this->tokcode = $tokcode;
    //     return $this;
    // }


    public function setTokcode(int $tokcode)
    {
        $this->tokcode = $tokcode;
        __QUERY('UPDATE tokens SET tokcode=' . (int) $tokcode . ' WHERE id=' . $this->getTokuse());
        return __AFFECTED();
    }

    public function setTokstart($tokstart)
    {
        __QUERY('UPDATE tokens SET tokstart = NOW() WHERE id = ' . $this->getTokuse());
        return __AFFECTED();
    }


    public function setTokend($tokend)
    {
        __QUERY('UPDATE tokens SET tokend = NOW() WHERE id = ' . $this->getTokuse());

        return __AFFECTED();
    }

    public function setTokuse(int $tokuse)
    {
        $this->tokuse = $tokuse;
        return $this;
    }

    public function setTokip(string $tokip)
    {
        $this->tokip = $tokip;
        return $this;
        //  $_SERVER['REMOTE_ADDR']
    }

    public function setToknav(string $toknav)
    {
        $this->toknav = $toknav;
        return $this;

        // $_SERVER['HTTP_USER_AGENT']
    }
}
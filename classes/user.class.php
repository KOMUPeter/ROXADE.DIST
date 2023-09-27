<?php
class User
{
    private  $useid;
    private  $useactive;
    private  $uselogin;
    private  $usepassword;
    private  $usenom;
    private $useadmin;

    public function __construct()
    {
        $this->useactive = 1;
        $this->useadmin = 1;
    }

    public function loadFromID($useid)
    {

        if ($result = __FETCH("SELECT * FROM users WHERE useid = '{$useid}'")) {
            // Populate the user object with data from the database
            $this->useid =  $result['useid'];
            $this->useactive =  $result['useactive'];
            $this->uselogin =  $result['uselogin'];
            $this->usepassword =  $result['usepassword'];
            $this->usenom =  $result['usenom'];
            $this->useadmin =  $result['useadmin'];

            return true;
        }

        return false; // User not found
    }

    public function changePassword()
    {
        if ($this->useactive == 0) {
            return false;
        }
        
        $password = mt_rand(100000, 999999);
        __QUERY('UPDATE users SET usepassword=PASSWORD("'.__STRING($password).'") WHERE useid='.$this->useid);
        // Prévoir envoi email via phpmailer
        return ($password);
    }

    public function deleteUser()
    {
        __QUERY('DELETE FROM users WHERE useid='.$this->useid);
        return __AFFECTED();
    }


    public function getUseid()
    {
        return $this->useid;
    }

    public function getUseactive()
    {
        return $this->useactive;
    }

    public function getUselogin()
    {
        return $this->uselogin;
    }

    public function setUselogin(string $uselogin)
    {
        $this->uselogin = $uselogin;
        return $this;
    }

    public function getUsepassword()
    {
        return $this->usepassword;
    }

    public function setUsepassword(string $usepassword)
    {
        $this->usepassword = $usepassword;
        return $this;
    }

    public function getUsenom()
    {
        return $this->usenom;
    }

    public function setUsenom(string $usenom)
    {
        $this->usenom = $usenom;
        return $this;
    }


	/**
	 * @return mixed
	 */
	public function getUseadmin() {
		return $this->useadmin;
	}
	
	/**
	 * @param mixed $useadmin 
	 * @return self
	 */
	public function setUseadmin($useadmin): self {
		$this->useadmin = $useadmin;
		return $this;
	}
}
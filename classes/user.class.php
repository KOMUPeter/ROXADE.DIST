<?php


class User
{
    private $useid;
    private $useactive;
    private $uselogin;
    private $usepassword;
    private $usenom;
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
            $this->useid = $result['useid'];
            $this->useactive = $result['useactive'];
            $this->uselogin = $result['uselogin'];
            $this->usepassword = $result['usepassword'];
            $this->usenom = $result['usenom'];
            $this->useadmin = $result['useadmin'];

            return true;
        }

        return false; // User not found
    }

    // public function loadFromID($useid)
    // {
    //     $databaseLink = new mysqli("localhost", "username", "password", "database");
    
    //     // Sanitize the user input to ensure it's a number and prevent SQL injection
    //     $useid = (int)$useid; 
    
    //     // Construct the SQL query
    //     $sql = "SELECT * FROM users WHERE useid = $useid";
    
    //     // Execute the query
    //     if ($result = $databaseLink->query($sql)) {
    //         // Check if a row is returned
    //         if ($result->num_rows > 0) {
    //             $row = $result->fetch_assoc();
    
    //             // Populate the user object with data from the database
    //             $this->useid = $row['useid'];
    //             $this->useactive = $row['useactive'];
    //             $this->uselogin = $row['uselogin'];
    //             $this->usepassword = $row['usepassword'];
    //             $this->usenom = $row['usenom'];
    //             $this->useadmin = $row['useadmin'];
    
    //             $result->close();
    //             return true;
    //         } else {
    //             $result->close();
    //             return false; // User not found
    //         }
    //     } else {
    //         return false; // Query execution failed
    //     }
    // }
    
    public function LoadFromLogin($uselogin)
    {

        if ($result = __FETCH('SELECT useid FROM users WHERE uselogin = "' . __STRING($uselogin) . '"')) {

            return ($this->loadFromID($result['useid']));

        } else {

            return false;
        }
    }

    public function updateEmail($email)
    {
        $this->uselogin = $email;

        __QUERY('UPDATE users SET uselogin = "' . __STRING($email) . '" WHERE useid = "' . $this->useid . '"');

        return __AFFECTED();
    }

    public function updateName($name)
    {
        $this->usenom = $name;

        __QUERY('UPDATE users SET usenom = "' . __STRING($name) . '" WHERE useid = "' . $this->useid . '"');

        return __AFFECTED();
    }



    public function newRecord($login, $nom)
    {

        __QUERY('INSERT INTO users (uselogin , usenom) VALUES ("' . __STRING($login) . '","' . __STRING($nom) . '")');
        $this->loadFromID(__INSERT_ID());

    }


    public function changePassword()
    {
        if ($this->useactive == 0) {
            return null;
        }

        $password = mt_rand(100000, 999999);

        __QUERY('UPDATE users SET usepassword=PASSWORD("' . __STRING($password) . '") WHERE useid=' . $this->useid);
        return ($password);
    }

    public function updateAdminStatus($useadmin){
        __QUERY("UPDATE users SET useadmin = " . intval($useadmin) . " WHERE useid = " . intval($this->useid));
    }
    

    public function deleteUser()
    {
        __QUERY('DELETE FROM users WHERE useid=' . $this->useid);
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
    public function getUseadmin()
    {
        return $this->useadmin;
    }

    /**
     * @param mixed $useadmin 
     * @return self
     */
    public function setUseadmin($useadmin): self
    {
        __QUERY('UPDATE users SET useadmin = "' . $useadmin . '" WHERE useid = "' . $this->useid . '"');
        return $this;
    }
}

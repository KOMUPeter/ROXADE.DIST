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

        /*
        $HTML = "<html><body><div>Support Roxade bonjour.</div></body>";
        $TEXT = "Votre nouveau mot de passe est : " . $password;
        $mail = new PHPMailer();
        $mail->From = "support@roxade.fr";
        $mail->FromName = "ROXADE";
        $mail->IsSMTP();
        $mail->Host = SMTP_HOST;
        $mail->Port = SMTP_PORT;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_LOGIN;
        $mail->Password = SMTP_PASSWORD;
        $mail->Subject = mb_encode_mimeheader("Votre mot de passe Roxade");
        $mail->Body = $HTML;
        $mail->AltBody = $TEXT;
        $mail->IsHTML(true);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->addAddress($this->uselogin);
        if ($mail->Send()) {

            // Prévoir envoi email via phpmailer
            return ($password);
        } else {
            return false; //echec de l'envoie
            
        }
        */
        return ($password);
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

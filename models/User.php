<?php 
class User
{
    private $id;
    private $mail;
    private $password;


    // GETTERS & SETTERS

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Vérifie que le format du nouveau mot de passe est valide.
     */ 
    public function verif()
    {
        $result = true;
        
        if(empty($this->mail)) 
        {
            $result = false;
        }  
        
        if(empty($this->password)) 
        {
            $result = false;
        }else{
            if(strlen($this->password)< 8)
            {
                echo 'Mot de passe trop court!';
                $result = false;
            }else{
                
                $num =0;
                $char = 0;

                for($i = 0; $i< strlen($this->password); $i++)
                {
                    if(is_numeric($this->password[$i]))
                    {
                        $num++;
                    }
                    if(is_string($this->password[$i]))
                    {
                        $char++;
                    }
                }
                if($num <2 )
                {
                    echo "tu dois saisir au moins 2 chiffres";
                    $result = false;
                }
                if($char <2 )
                {
                    echo "tu dois saisir au moins 2 caractères";
                    $result = false;
                }
            }
        }
        return $result;
    }
    public function edit()
    {
        $db = new Database();
        return $db->update(
            "UPDATE user SET mail = ?, `password`=? WHERE id = ?",
            [
                $this->mail,
                password_hash($this->password,PASSWORD_BCRYPT),
                $this->id
            ]
            );
    }
    public static function getByMail($mail) {
       $db= new Database();
       return $db->getOne(" SELECT * FROM user WHERE mail = ?",
       [$mail],
       "User"
    );
    }
    public static function getById($id){
        $db = new Database();
        return $db->getOne("SELECT * FROM user WHERE id= ?", [$id], 'User'
    );
    }



}
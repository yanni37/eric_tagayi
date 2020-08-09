<?php
require_once 'utilities/Database.php';

class Contact 
{
    private $id;
    private $email;
    private $sujet;
    private $contenue;
    private $date;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * @param mixed $sujet
     */
    public function setSujet($sujet): void
    {
        $this->sujet = $sujet;
    }

    /**
     * @return mixed
     */
    public function getContenue()
    {
        return $this->contenue;
    }

    /**
     * @param mixed $contenue
     */
    public function setContenue($contenue): void
    {
        $this->contenue = $contenue;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function add() {
        
        $db = new Database();

        return $db->insert(
            "INSERT INTO contact(email, `contenue`, sujet)
            VALUE (?,?, ?) ",
            [
                $this->email,
                $this->contenue,
                $this->sujet
            ]
        );
    }

    public function delete()
    {
        $db= new Database();

       $result =  $db->insert(
            "DELETE FROM contact WHERE id = ?",
            [
                $this->id
            ]
            );
       if(!$result)
       {
           throw new Exception('Erreur de suppression');
       }
    }
    public static function getAll()
    {
        $db = new Database();
        return $db->getMany(
            "SELECT * FROM contact",
            'Contact'
        );
    }

    public static function getOne($id)
    {
        $db = new Database();
        return $db->getOne(
            "SELECT * FROM contact 
            WHERE id = ?",
            [$id],
            'Contact'
        );
    }


}



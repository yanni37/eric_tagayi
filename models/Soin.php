<?php
require_once 'utilities/Database.php';

Class Soin
{
    private $id;
    private $titre;
    private $contenu;
    private $image;
    private $category;

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of contenu
     */ 
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set the value of contenu
     *
     * @return  self
     */ 
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get the value of images
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of images
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }


    /**
     * Insérer un soin
     * @throws Exception
     */
    public function insert(): void
    {
        $db = new Database()   ;
        $result = $db->insert("INSERT INTO soin (titre, contenu, `image`, category) VALUES (?,?,?,?)",
            [
                $this->titre,
                $this->contenu,
                $this->image,
                $this->category
            ]);

        if(!$result)
        {
            throw new Exception("L'élément n'est pas inséré");
        }
    }

    /**
     * Récupérer tous les soins
     * @return array
     */
    public static function getAllSoins() : array
    {
        $db = new Database()   ;
        $soins = $db->getMany("SELECT * FROM soin", "Soin");
        return $soins;
    }

    /**
     * Récupérer tous les soins par catégorie
     * @param int $id
     * @return array
     */
    public static function getByCategory(int $id) : array
    {
        $db = new Database()   ;
        $soins = $db->getMany("SELECT * FROM soin WHERE category = ?", "Soin", [$id]);
        return $soins;
    }

    /**
     * Récupérer un soin par identifiant
     * @param int $id
     * @return Soin
     */
    public static function getOne(int $id) : Soin
    {
        $db = new Database()   ;
        $soin = $db->getOne("SELECT * FROM soin WHERE id = ?", [$id], "Soin");
        return $soin;
    }

    public function delete()
    {
        $db = new Database()   ;
        $result = $db->delete("DELETE FROM `soin` WHERE `soin`.`id` = ?", $this->id);

        if(!$result)
        {
            throw new Exception("Erreur de suppression");
        }
    }

    public function edit()
    {
        $db = new Database();
        $db->update("UPDATE `soin` SET `contenu` = ?, titre = ? , image= ?, category = ? WHERE `soin`.`id` = ?",
            [
                $this->contenu,
                $this->titre,
                $this->image,
                $this->category,
                $this->id
            ]);
    }
}
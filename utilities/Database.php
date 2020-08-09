<?php


class Database
{

    private $cnx;
    private $lastId;

    public function __construct()
    {
        try {
            $this->cnx = new PDO("mysql:host=".DATABASE['host'].";dbname=".DATABASE['dbname'].";charset=utf8",DATABASE['user'],DATABASE['password'] );
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    /**
     * Retourne l'identifiant (clé primaire) de la dernière ligne ajoutée
     *
     * @return integer
     */
    public function getLastId() : int
    {
        return $this->lastId;
    }

    /**
     * Insérer dans la BDD
     *
     * @param string $request
     * @param array $params
     * @return boolean
     */
    public function insert(string $request, array $params) : bool
    {
        $stmt = $this->cnx->prepare($request);
        $result = $stmt->execute($params);
       
        $this->lastId = ($this->cnx)->lastInsertId();
        return $result;
    }
    public function getOne(string $request, array $params, string $class)  // getUserById
   {
       $stmt = ($this->cnx)->prepare($request);
        $stmt->execute($params);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
       return $stmt->fetch();
   }
   public function getMany(string $request, string $class, array $params = []) 
   {
    $stmt = $this->cnx->prepare($request);
    $stmt->execute($params);
    $result = $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    
    return $result;
   }
   public function update(string $request, array $params)  // edit
   {
       $stmt = ($this->cnx)->prepare($request);
       $result = $stmt->execute($params);
       return $result;
   }
   public function delete(string $request, int $id)  // delete
   {
       $stmt = ($this->cnx)->prepare($request);
       $result = $stmt->execute([$id]);
       return $result;
   }

}
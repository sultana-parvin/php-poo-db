<?php
class Database{
    public $host;
    public $user;
    public $dbname;
    public $password;
    public $connexion;
    public $prepareRequest;

    public function __construct($host, $user, $dbname, $password){
        $this->host = $host;
        $this->user = $user;
        $this->dbname = $dbname;
        $this->password = $password;
    }

     public function connect(){
        $path = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8";
        return $this->connexion = new PDO($path, $this->user, $this->password);
     }

     public function prepReq($request)
     {
        $this->prepareRequest = $this->connexion->prepare($request);
        return $this->prepareRequest->execute();
     }

     public function fetchData(){
        return $this->prepareRequest->fetchAll();
     }
}
<?php

class UserModel {

    private $conn;

    public function __construct() {
       
        try{   

       
          $this->conn  = new PDO('mysql:dbname=corso_formarete;host=localhost','root','');
          $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
          $this->conn->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE );  
        
        } catch (\PDOException $e) {
            //TODO: togliere echo
          echo $e->getMessage();
    
    }

}

    //ACRONIMO PARA INTERACTUAR CON EL DATABASE
    //CRUD
    public function create (User $user)// o public function add (){}// o public function save (){}
    {

    try{

        $pdostm = $this->conn->prepare('INSERT INTO User (firstName,lastName,email,birthday)
                                           VALUES (:firstName,:lastName,:email,:birthday); ');
                                           
        $pdostm->bindValue(':firstName',$user->getFirstName(),PDO::PARAM_STR);
        $pdostm->bindValue(':lastName',$user->getLastName(),PDO::PARAM_STR);
        $pdostm->bindValue(':email',$user->getEmail(),PDO::PARAM_STR);
        $pdostm->bindValue(':birthday',$user->getBirthday(),PDO::PARAM_STR);

        $pdostm->execute();

    } catch (\PDOException $e) {
        //TODO: togliere echo
        echo $e->getMessage();
    } 
}
    public function read (){}
    public function update (){}
    public function delete (){}

}
<?php
require './src/entity/User.php';

try {
    //READ / LIST
    $conn = new PDO('mysql:dbname=corso_formarete;host=localhost','root','');
    $stm = $conn->prepare('select * from User;');
    $stm ->execute();
    $result = $stm->fetchAll(PDO::FETCH_CLASS,'User');// es como el UserFactory
    //new User()id 3
    //new User()id 4
    //new User()id 7
    //new User()id 8
    //new User()id 9


    print_r($result);


    //print_r($conn);
} catch (\PDOException  $e) {
    echo $e->getMessage()."\n";
}
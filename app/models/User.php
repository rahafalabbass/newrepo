<?php

declare (strict_types=1);
namespace app\models;
require_once  __DIR__. '\baseModel.php';

use app\baseModels\baseModel;
class User extends baseModel
{

public int $id;
public string $name;
public string $email;


public function __construct()
{ 
  parent::__construct();
}

public function register($name,$email){
  $query = "INSERT INTO users (name,email) VALUES( "."'$name'".","."'$email'"." )";
  $sql = $this->connection->query($query);
}

public function get_one($args){
  $query ="SELECT * FROM users where name = ". "'$args'" ." or email= "."'$args'";
  $sql = $this->connection->query($query);
  return $sql;
}

public function edit($newName,$newEmail,$name){
  $query = "UPDATE users SET name = "."'$newName'".", email = "."'$newEmail'"." WHERE name = "."'$name'"." or email= "."'$name'";
  $sql = $this->connection->query($query);
}


}

?>

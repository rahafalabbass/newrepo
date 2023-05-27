<?php
namespace app\controllers;
require_once  __DIR__. '\..\models\User.php';
require __DIR__.'\baseController.php';
use app\models\User;
use app\baseControllers\baseController;

 


class userController extends baseController
{
public function __construct()
{
$this->model=new User();
}

public function all(){
  $result=$this->model->all('users','*');

  while ($row =$result->fetch_object()) {
    $user = new User();
    $user->id=$row->id;
    $user->name=$row->name;
    $user->email=$row->email;
    $users[] = $user;
  }
  $this->load_view('all-users',$users);
}

public function register(){
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $result = $this->model->register($name,$email);
    header('Location:/all-users');
  }else{
    $this->load_view('register',[]);
  }
}

public function get_one(){
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $search = $_POST['search'];
    $sql = $this->model->get_one($search);
    $result = $sql->fetch_object();

    $user = new User();
    $user->id=$result->id;
    $user->name=$result->name;
    $user->email=$result->email;
    $users[] = $user;
    // if(!$result){
    //   echo "Sorry, but this name doesn't exist";
    // }else{
      $this->load_view('one-user',$users);
    // }
  }else{
    $this->load_view('search',[]);
  }
}

public function edit(){
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['oldName'];
    $newName = $_POST['nName'];
    $newEmail = $_POST['nEmail'];
    $sql = $this->model->get_one($name);
    $result = $sql->fetch_object();
    // if(!$result){
    //   echo "Sorry, but this name doesn't exist";
    // }else{
      $user = new User();
      $user->id=$result->id;
      $id = $user->id;
      $sql2 = $this->model->edit($newName,$newEmail,$id);
    // }
    header('Location:/all-users');
  }else{
    $this->load_view('update_form',[]);
  }
}

}

?>
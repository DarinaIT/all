<?php

 include_once 'Database.php';
 class User {
 	private $db;
 	public function __construct(){
 		 $this->db = new Database();
    }

   public function addUser($product){

      $sql = "INSERT INTO users_dari_test(username, email, password) VALUES(:username, :email, :password)";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':username' , $product['username']);
      $query->bindValue(':email' , $product['email']);
      $query->bindValue(':password' , $product['password']);
      $result = $query->execute();
      if ($result) {
               $msg = "<div class='alert alert-success'><strong> Success ! </strong>   </div>";
      return $msg;
      }else{
               $msg = "<div class='alert alert-danger'><strong> Error ! </strong>   </div>";
      return $msg;
      }

   }

   public function getUserData(){
      $sql = "SELECT * FROM users_dari_test";
      $query = $this->db->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchAll();
      return $result;
   }



}

?>

<?php

 include_once 'Database.php';
 class User {
 	private $db;
 	public function __construct(){
 		 $this->db = new Database();
    }


   public function updateUser($userInfo){
     $sql = "UPDATE hex_users SET fname = :fname,
                                     lname = :lname,
                                     email = :email,
                                     phone = :phone

      WHERE id = :id";

      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':id' , $userInfo['id']);
      $query->bindValue(':fname' , $userInfo['fname']);
      $query->bindValue(':lname' , $userInfo['lname']);
      $query->bindValue(':email' , $userInfo['email']);
      $query->bindValue(':phone' , $userInfo['phone']);

      $result = $query->execute();
      if ($result) {
               $msg = "<div class='alert alert-success'><strong> Success ! </strong>   </div>";
      return $msg;
      }else{
               $msg = "<div class='alert alert-danger'><strong> Error ! </strong>   </div>";
      return $msg;
      }
   }


   public function getSingleUserData($userID){
      $sql = "SELECT * FROM hex_users WHERE id=".$userID;
      $query = $this->db->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchAll();
      return $result[0];
   }

   public function getAddedFormUsers(){
      $sql = "SELECT `hex_users_id` FROM users_sales";
      $query = $this->db->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchAll();
      return $result;
   }


   public function addUserSales($usersSalesInfo){
      $sql = "INSERT INTO users_sales(hex_users_id, fname, lname, email, phone, investment, sales_agreement) VALUES(:hex_users_id, :fname, :lname, :email, :phone, :investment, :sales_agreement)";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':hex_users_id' , $usersSalesInfo['id']);
      $query->bindValue(':fname' , $usersSalesInfo['fname']);
      $query->bindValue(':lname' , $usersSalesInfo['lname']);
      $query->bindValue(':email' , $usersSalesInfo['email']);
      $query->bindValue(':phone' , $usersSalesInfo['phone']);
      $query->bindValue(':investment' , $usersSalesInfo['investment']);
      $query->bindValue(':sales_agreement' , $usersSalesInfo['sales_agreement']);
      $result = $query->execute();
      if ($result) {
               $msg = "<div class='alert alert-success'><strong> Success ! </strong>   </div>";
      return $msg;
      }else{
               $msg = "<div class='alert alert-danger'><strong> Error ! </strong>   </div>";
      return $msg;
      }
   }


   public function updateClaimCoin($userID){
     $sql = "UPDATE users_sales SET claimed = :claimed WHERE hex_users_id = :id";

      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':id' , $userID);
      $query->bindValue(':claimed' , 1);

      $result = $query->execute();
      if ($result) {
               $msg = "<div class='alert alert-success'><strong> Success! Coins are claimed. </strong>   </div>";
      return $msg;
      }else{
               $msg = "<div class='alert alert-danger'><strong> Error ! </strong>   </div>";
      return $msg;
      }
   }


}

?>

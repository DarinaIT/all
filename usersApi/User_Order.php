<?php
include_once 'Database.php';
class User_Order {
 private $db;
 public function __construct(){
    $this->db = new Database();
   }
  public function get_user_information($user_id){
    $sql = "SELECT * FROM hex_users WHERE id=".$user_id;
    $query = $this->db->pdo->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    return $result[0];
  }

}




?>

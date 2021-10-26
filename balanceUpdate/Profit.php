<?php

 include_once 'Database.php';
 class Profit {
 	private $db;
 	public function __construct(){
 		 $this->db = new Database();
    }

   public function updateProfit($newBalance){
     $sql = "UPDATE profits SET profit=:profit
      WHERE user_id = :id";

      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':id' , $newBalance['id']);
      $query->bindValue(':profit' , $newBalance['profit']);
      $result = $query->execute();
      if ($result) {
               $msg = "<div class='alert alert-success'><strong> Success ! </strong>   </div>";
      return $msg;
      }else{
               $msg = "<div class='alert alert-danger'><strong> Error ! </strong>   </div>";
      return $msg;
      }
   }





}

?>

<?php

 include_once 'Database.php';
 class Info {
 	private $db;
 	public function __construct(){
 		 $this->db = new Database();
    }

   public function addInfo($updated_at, $name, $symbol, $price, $price_BNB){

      $sql = "INSERT INTO infos(updated_at, name, symbol, price, price_BNB) VALUES(:updated_at, :name, :symbol, :price, :price_BNB)";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':updated_at' , $updated_at);
      $query->bindValue(':name' , $name);
      $query->bindValue(':symbol' , $symbol);
      $query->bindValue(':price' , $price);
      $query->bindValue(':price_BNB' , $price_BNB);
      //print_r($query); exit;
      $result = $query->execute();
      if ($result) {
               $msg = "<div class='alert alert-success'><strong> Success ! </strong>   </div>";
      return $msg;
      }else{
               $msg = "<div class='alert alert-danger'><strong> Error ! </strong>   </div>";
      return $msg;
      }

   }


   public function getInfoData(){
      $sql = "SELECT * FROM infos";
      $query = $this->db->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchAll();
      return $result;
   }




}

?>

<?php

 include_once 'Database.php';
 class Wallet {
 	private $db;
 	public function __construct(){
 		 $this->db = new Database();
    }


   public function getWalletsWithMinimumValue($kudanAmount){
      $sql = "SELECT * FROM wallets WHERE balance>".$kudanAmount;
      $query = $this->db->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchAll();
      return $result;
   }




}

?>

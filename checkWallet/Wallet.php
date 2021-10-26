<?php

 include_once 'Database.php';
 class Wallet {
 	private $db;
 	public function __construct() {
 		 $this->db = new Database();
  }

  public function searchForWallet($walletAddress,$balance){
    $sql = "SELECT * FROM wallets WHERE holderAddress=".'"'.$walletAddress.'" AND balance >'.$balance;
    $query = $this->db->pdo->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    if(empty($result)){
      return 0;
    } else{
      return 1;
    }
  }


}


?>

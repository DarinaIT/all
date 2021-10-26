<?php

 include_once 'Database.php';
 class MetamaskPayment {
 	private $db;
 	public function __construct() {
 		 $this->db = new Database();
  }

  public function saveMetamaskPaymentInfo($info){
    $sql = "INSERT INTO metamaskPayments(bscAddress, ethAddress, price, isPaid) VALUES(:bscAddress, :ethAddress, :price, :isPaid)";
    $query = $this->db->pdo->prepare($sql);
    $query->bindValue(':bscAddress' , $info['wallet']);
    $query->bindValue(':ethAddress' , $clainfoimedCoins['ethereumAddress']);
    $query->bindValue(':price' , $info['bnbAmount']);
    $query->bindValue(':isPaid' , 1);
    $result = $query->execute();
    if ($result) {
             $msg = 1;
    return $msg;
    }else{
             $msg = 0;
    return $msg;
  }


}
}

?>

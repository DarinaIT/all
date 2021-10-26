<?php

 include_once 'Database.php';
 class Price {
 	private $db;
 	public function __construct(){
 		 $this->db = new Database();
    }

   public function addPriceRate($priceRate){

      $sql = "INSERT INTO prices(busd_usd, btc_usd, usdt_usd, bnb_busd) VALUES(:busd_usd, :btc_usd, :usdt_usd, :bnb_busd)";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':busd_usd' , $priceRate['busd_usd']);
      $query->bindValue(':btc_usd' , $priceRate['btc_usd']);
      $query->bindValue(':usdt_usd' , $priceRate['usdt_usd']);
      $query->bindValue(':bnb_busd' , $priceRate['bnb_busd']);
      $result = $query->execute();
      if ($result) {
               $msg = "<div class='alert alert-success'><strong> Success ! </strong>   </div>";
      return $msg;
      }else{
               $msg = "<div class='alert alert-danger'><strong> Error ! </strong>   </div>";
      return $msg;
      }

   }


   public function updatePrice($priceRate){
     $sql = "UPDATE prices SET busd_usd = :busd_usd,
                                     btc_usd = :btc_usd,
                                     usdt_usd = :usdt_usd,
                                     bnb_busd = :bnb_busd
      WHERE id = :id";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':id' , 3);
      $query->bindValue(':busd_usd' , $priceRate['busd_usd']);
      $query->bindValue(':btc_usd' , $priceRate['btc_usd']);
      $query->bindValue(':usdt_usd' , $priceRate['usdt_usd']);
      $query->bindValue(':bnb_busd' , $priceRate['bnb_busd']);


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

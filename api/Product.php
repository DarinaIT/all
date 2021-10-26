<?php

 include_once 'Database.php';
 class Product {
 	private $db;
 	public function __construct(){
 		 $this->db = new Database();
    }

   public function addProduct($product){

      $sql = "INSERT INTO products_dari_test(name, price, origin) VALUES(:name, :price, :origin)";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':name' , $product['name']);
      $query->bindValue(':price' , $product['sale_price']);
      $query->bindValue(':origin' , $product['origin']);
      $result = $query->execute();
      if ($result) {
               $msg = "<div class='alert alert-success'><strong> Success ! </strong>   </div>";
      return $msg;
      }else{
               $msg = "<div class='alert alert-danger'><strong> Error ! </strong>   </div>";
      return $msg;
      }

   }

   public function getProductData(){
      $sql = "SELECT * FROM products_dari_test";
      $query = $this->db->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchAll();
      return $result;
   }



}

?>

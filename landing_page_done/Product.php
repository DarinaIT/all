<?php

 include_once 'Database.php';
 class Product {
 	private $db;
 	public function __construct(){
 		 $this->db = new Database();
    }

   public function addProduct($product){

      $sql = "INSERT INTO products(product) VALUES(:product)";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':product' , $product);
      $result = $query->execute();
      if ($result) {
               $msg = "<div class='alert alert-success'><strong> Success ! </strong>   </div>";
      return $msg;
      }else{
               $msg = "<div class='alert alert-danger'><strong> Error ! </strong>   </div>";
      return $msg;
      }

   }

   public function updateProduct($product){

      $sql = "UPDATE products SET productName = :productName WHERE id = :id";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':id' , $product['id']);
      $query->bindValue(':productName' , $product['name']);
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

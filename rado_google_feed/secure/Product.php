<?php

 include_once 'Database.php';
 class Product {
 	private $db;
 	public function __construct(){
 		 $this->db = new Database();
    }

   public function addProduct($product){

      $sql = "INSERT INTO hex_products(name) VALUES(:name)";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':name' , $product['name']);
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
     $sql = "UPDATE hex_products SET name = :name,
                                     description = :description,
                                     keywords = :keywords,
                                     category = :category,
                                     condition = :condition,
                                     has_variations = :has_variations,
                                     reg_price = :reg_price,
                                     sale_price = :sale_price,
                                     quantity = :quantity,
                                     sku = :sku,
                                     shipping_cost = :shipping_cost,
                                     shipping_fee = :shipping_fee,
                                     shipping_time = :shipping_time,
                                     status = :status,
                                     last_status = :last_status,
                                     origin = :origin,
                                     brand = :brand,
                                     model_number = :model_number,
                                     weight = :weight,
                                     length = :length,
                                     width = :width,
                                     height = :height,
                                     poster = :poster,
                                     thumb = :thumb,
                                     variation_type = :variation_type,
                                     sizing_type = :sizing_type,
                                     user_id = :user_id,
                                     sold = :sold,
                                     rating = :rating,
                                     reviews = :reviews,
                                     profit = :profit,
                                     activity_status = :activity_status,
                                     approved = :approved,
                                     editing_stage = :editing_stage,
                                     payment_method = :payment_method,
                                     time = :time,
                                     feed = :feed,
                                     market =:market,
                                     currency = :currency,
                                     promo = :promo
      WHERE id = :id";
      //$sql = "UPDATE hex_products SET productName = :productName WHERE id = :id";
      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':id' , $product['id']);
      $query->bindValue(':name' , $product['name']);

      $query->bindValue(':description' , $product['description']);
      $query->bindValue(':keywords' , $product['keywords']);
      $query->bindValue(':category' , $product['category']);
      $query->bindValue(':condition' , $product['condition']);
      $query->bindValue(':has_variations' , $product['has_variations']);
      $query->bindValue(':reg_price' , $product['reg_price']);
      $query->bindValue(':sale_price' , $product['sale_price']);
      $query->bindValue(':quantity' , $product['quantity']);
      $query->bindValue(':sku' , $product['sku']);
      $query->bindValue(':shipping_cost' , $product['shipping_cost']);
      $query->bindValue(':shipping_fee' , $product['shipping_fee']);
      $query->bindValue(':shipping_time' , $product['shipping_time']);
      $query->bindValue(':status' , $product['status']);
      $query->bindValue(':last_status' , $product['last_status']);
      $query->bindValue(':model_number' , $product['model_number']);
      $query->bindValue(':brand' , $product['brand']);
      $query->bindValue(':weight' , $product['weight']);
      $query->bindValue(':length' , $product['length']);
      $query->bindValue(':width' , $product['width']);
      $query->bindValue(':height' , $product['height']);
      $query->bindValue(':poster' , $product['poster']);
      $query->bindValue(':thumb' , $product['thumb']);
      $query->bindValue(':variation_type' , $product['variation_type']);
      $query->bindValue(':sizing_type' , $product['sizing_type']);
      $query->bindValue(':user_id' , $product['user_id']);
      $query->bindValue(':sold' , $product['sold']);
      $query->bindValue(':rating' , $product['rating']);
      $query->bindValue(':reviews' , $product['reviews']);
      $query->bindValue(':profit' , $product['profit']);
      $query->bindValue(':activity_status' , $product['activity_status']);
      $query->bindValue(':approved' , $product['approved']);
      $query->bindValue(':editing_stage' , $product['editing_stage']);
      $query->bindValue(':payment_method' , $product['payment_method']);
      $query->bindValue(':time' , $product['time']);
      $query->bindValue(':feed' , $product['feed']);
      $query->bindValue(':market' , $product['market']);
      $query->bindValue(':currency' , $product['currency']);
      $query->bindValue(':promo' , $product['promo']);


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
      $sql = "SELECT * FROM hex_products";
      $query = $this->db->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchAll();
      return $result;
   }

   public function getSingleProductData($productID){
      $sql = "SELECT * FROM hex_products WHERE id=".$productID;
      $query = $this->db->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchAll();
      return $result;
   }

      public function getPromoProductData(){
      $sql = "SELECT * FROM hex_products where promo=1";
      $query = $this->db->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchAll();
      return $result;
   }


}

?>

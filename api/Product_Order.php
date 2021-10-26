<?php
include_once 'Database.php';
class Product_Order {
 private $db;
 public function __construct(){
    $this->db = new Database();
   }
  public function get_product_order_information($prod_id){
    $sql = "SELECT * FROM hex_products WHERE id=".$prod_id;
    $query = $this->db->pdo->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    return $result[0];
  }

  // public function get_product_order_information(){
  //   $sql = "DELIMITER $$
  //   CREATE TRIGGER after_orders_get_info
  //   AFTER INSERT
  //   ON hex_orders FOR EACH ROW
  //   BEGIN
  //       SELECT * FROM hex_products WHERE id=NEW.prod_id;
  //   END$$
  //   DELIMITER ;";
  //   $query = $this->db->pdo->prepare($sql);
  //   $query->execute();
  //   $result = $query->fetchAll();
  //   return $result;
  // }
}




?>

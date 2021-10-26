<?php

 include_once 'Database.php';
 class JsonDarina {
 	private $db;
 	public function __construct() {
 		 $this->db = new Database();
  }

  public function add_jsonFile_attributes($jsonFile, $attributes_id){

    $attributes = [];
    foreach($jsonFile as $key=>$value){
      if($key=="attributes"){
        $attributes = $value;
      }
    }

  $jsonAttributes=[];
  $n=0;
  foreach($attributes as $attribute){
    foreach($attribute as $key=>$value){
      $n++;
      if($key=="trait_type"){
        $jsonAttributes[$n][$key]=$value;
      }
      if($key=="value"){
        $n = $n-1;
        $jsonAttributes[$n][$key]=$value;
      }
    }
  }


  foreach($jsonAttributes as $k=>$attribute){
    foreach($attribute as $kk=>$vv){
      if($kk=="trait_type"){
        $trait_type = $vv;
      }
      if($kk=="value"){
        $value=$vv;
      }
    }
    $sql = "INSERT INTO jsonDarinaAttributes(attributes_id, trait_type, value) VALUES(:attributes_id, :trait_type, :value)";
    $query = $this->db->pdo->prepare($sql);
    $query->bindValue(':attributes_id' , $attributes_id);
    $query->bindValue(':trait_type' , $trait_type);
    $query->bindValue(':value' , $value);
    $result = $query->execute();
  }


     if ($result) {
              $msg = 1;
     return $msg;
     }else{
              $msg = 0;
     return $msg;
     }
  }

  public function add_jsonFile($jsonFile){
     $sql = "INSERT INTO jsonDarina(dna, name, description, image, edition, date, compiler) VALUES(:dna, :name, :description, :image, :edition, :date, :compiler)";
     $query = $this->db->pdo->prepare($sql);
     $query->bindValue(':dna' , $jsonFile['dna']);
     $query->bindValue(':name' , $jsonFile['name']);
     $query->bindValue(':description' , $jsonFile['description']);
     $query->bindValue(':image' , $jsonFile['image']);
     $query->bindValue(':edition' , $jsonFile['edition']);
     $query->bindValue(':date' , $jsonFile['date']);
     $query->bindValue(':compiler' , $jsonFile['compiler']);
     $result = $query->execute();

     $this->last_insert_id = $this->db->pdo->lastInsertId();
     $resultAttributes = self::add_jsonFile_attributes($jsonFile, $this->last_insert_id);

     if ($result && $resultAttributes) {
              $msg = "<div class='alert alert-success'><strong> Success ! </strong>   </div>";
     return $msg;
     }else{
              $msg = "<div class='alert alert-danger'><strong> Error ! </strong>   </div>";
     return $msg;
     }

  }






}

?>

<?php
 include_once 'Database.php';
 class Question {
 	private $db;
 	public function __construct(){
 		 $this->db = new Database();
    }

   public function getQuestionsData(){
      $sql = "SELECT * FROM questions";
      $query = $this->db->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchAll();
      return $result;
   }
}
?> 

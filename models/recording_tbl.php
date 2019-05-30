<?php
/**
 * Summary:
 * 
 */

class RecordingModel
{
   /**
    * Table = 
    * Fields = 
    */
   
   private $conn;
   private $error;

   private $queryConditions;

   public function __construct(){
      $this->error = new ErrorHandler();
      
      // Create connection
//       $this->conn = mysqli_connect(db1_host, db1_port, db1_user, db1_password, db1_database);
         $this->conn = pg_connect("host=".db1_host." port=".db1_port." dbname=".db1_database." user=".db1_user." password=".db1_password."")
      
      // Check connection
      if (!$this->conn) {
         $this->error->add("ErrorHandler: " . pg_last_error());
      }

   }

   public function conditions($conditions){
      $this->queryConditions = $conditions;
      return $this;
   }

   public function lastId(){
      return pg_result_status($this->conn, PGSQL_STATUS_LONG);
   }

   public function create($inputs){

      list($fields, $bindValues) = $this->createBindables($inputs);

      $query = "INSERT INTO recording_tbl ({$fields}) 
      VALUE ({$bindValues})";
      
      $result = pg_query($this->conn, $query);

      if ($result) {
         return true;
      } else {
         $this->error->add("ErrorHandler: " . pg_last_error($this->conn));
         return false;
      }

   }

   public function read($fields){

      $queryConditions = isset($this->queryConditions) ? $this->queryConditions : '';

      $query = "SELECT {$fields} FROM recording_tbl {$queryConditions}";
      
      $result = pg_query($this->conn, $query);

      if (pg_num_rows($result) > 0) {

         $result = pg_fetch_all($result, PGSQL_ASSOC);

         return $result;

      } else {
         $this->error->add("ErrorHandler: " . $this->conn->connect_error);
         return false;
      }
   }

   public function update($updates){

      $sets = $this->updateBindables($updates);

      $queryConditions = isset($this->queryConditions) ? $this->queryConditions : '';

      $query = "UPDATE recording_tbl SET {$sets} {$queryConditions}";

      $result = pg_query($this->conn, $query);

      if ($result) {

         $affected = pg_affected_rows($this->conn);

         return $affected;

      } else {
         $this->error->add("ErrorHandler: " . $this->conn->connect_error);
         return false;
      }

   }

   public function delete(){

      $queryConditions = isset($this->queryConditions) ? $this->queryConditions : '';

      $query = "DELETE FROM recording_tbl {$queryConditions}";
      
      $result = pg_query($this->conn, $query);

      if ($result === TRUE) {
         return true;
      } else {
         $this->error->add("ErrorHandler: " . $this->conn->connect_error);
         return false;
      }

   }

   private function createBindables($inputs){
      $fields = array();
      $bindValues = array();

      foreach ($inputs as $field => $value) {
         $fields[] = $field;
         $bindValues[] = '"' . $this->sanitize($value) . '"';
      }

      $fields = implode(',', $fields);
      $bindValues = implode(',', $bindValues);

      return array($fields, $bindValues);
   }

   private function updateBindables($updates){
      $sets = array();

      foreach ($updates as $field => $value) {
         $value = $this->sanitize($value);
         $sets[] = $field . " = '" . $value . "'";
      }

      $sets = implode(', ', $sets);

      return $sets;
   }

   private function sanitize($value){
      $value = $this->conn->real_escape_string($value);
      $value = (null !==  (get_magic_quotes_gpc())) ? stripcslashes($value) : null;
      $value = strip_tags($value);
      $value = htmlentities($value);
      return $value;
   }

}

?>

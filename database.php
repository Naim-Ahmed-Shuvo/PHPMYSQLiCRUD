<?php

class Database{
    public $db_host = DB_HOST;
    public $db_user = DB_USER;
    public $db_pass = DB_PASS;
    public $db_name = DB_NAME;

    public $link;
    public $error;

    public function __construct()
    {
        $this->connectDB();
    }

    private function connectDB(){
        $this->link = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        if(!$this->link){
            $this->error = "Connection Failed".$this->link->connect_error;
            return false;
        }
    }

    // select or read
    public function selectorRead($query){
          $result = $this->link->query($query) or die ($this->link->error.__LINE__);

          if($result->num_rows>0){
              return  $result;
          } else{
              return false;
          }
    }

   // insert new row
    public function insert($query){
        $insert_row = $this->link->query($query) or die ($this->link->error.__LINE__);

          if($insert_row){
              header("Location: index.php?msg=".urlencode("Data inserted successfully"));
              exit();
          } else{
              die("Error : (".$this->link->errno.")".$this->link->error);
          }
    }

     //update
    public function update($query){
        $insert_row = $this->link->query($query) or die ($this->link->error.__LINE__);

          if($insert_row){
              header("Location: index.php?msg=".urlencode("Data inserted successfully"));
              exit();
          } else{
              die("Error : (".$this->link->errno.")".$this->link->error);
          }
    }


   // delete
    public function delete($query){
        $insert_row = $this->link->query($query) or die ($this->link->error.__LINE__);

          if($insert_row){
              header("Location: index.php?delmsg=".urlencode("Data Deleted successfully"));
              exit();
          } else{
              die("Error : (".$this->link->errno.")".$this->link->error);
          }
    }
}
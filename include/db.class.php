<?php
 /**
 * db class
 * @selim
 */
class db{

    private $conn = NULL;

    public function db($host, $user, $pwd, $dbname){
	
       $this->__connect($host, $user, $pwd, $dbname);
	}

    public function __connect($host, $user, $pwd, $dbname){

	    $this->conn = mysql_connect($host, $user, $pwd);
        mysql_select_db($dbname);
	}

	public function query($sql){
	     
	    $query = mysql_query($sql, $this->conn);
		return $query;
	}

	public function fetch_array($query){
	    
		 $result = mysql_fetch_array($query);
         return $result;
	}

	public function close(){
	
	      mysql_close($this->conn);
	}


}



?>

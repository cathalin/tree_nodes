<?php

/**
 * Description of DB_MySQL
 *
 * @author patric gutersohn
 */
class dbConnection {
  private $dbConnect = null;
  private $result = null;

  //you need to set server, user, password and database to your database configuration
  private $dbconfig = array(
			'server' => '127.0.0.1', 
			'user' => 'root',
			'password' => 'paro1208gs',
			'database' => 'db214043_1294',
			);
 
  public function __construct(){
	$this->dbConnect = mysql_connect(
                $this->dbconfig['server'],
                $this->dbconfig['user'],
                $this->dbconfig['password'],
                true);	
  	mysql_select_db($this->dbconfig['database'], $this->dbConnect);
  }
 
  public function disconnect() {
    if (is_resource($this->dbConnect))				
        mysql_close($this->dbConnect);
  }
 
  public function query($query) {
    mysql_query("SET NAMES 'utf8'");
  	$this->result = mysql_query($query);
  	$this->counter = null;
        return $this->result;
  }
 
  public function fetchRow() {
  	return mysql_fetch_assoc($this->result);
  }
  
  public function count() {
  	if($this->counter == NULL && is_resource($this->result)) {
  		$this->counter = mysql_num_rows($this->result);
  	}
 
	return $this->counter;
  }
  
  
}

?>

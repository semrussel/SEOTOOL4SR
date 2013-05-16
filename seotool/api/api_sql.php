<?php


	class mysql {
		public $mysql;
		public $db;
		public $query;
		public $result;
		public $row;
		public $temprow;
		public $count=0;
		
		
		public function __construct() {
			$this->mysql = mysql_connect('localhost','root','');
			$this->db = mysql_select_db('srdb',$this->mysql);
  
		}
		
		public function query($message) {
			$this->query = $message;
			$this->result =  mysql_query($this->query);

			$this->count=0;
			if ($this->result==true){	 
				 while ($this->temprow=mysql_fetch_assoc($this->result)) {
						$this->row[$this->count] = $this->temprow;
						$this->count++;
				 }
			}
		}

		
		public function __destruct() {
			mysql_close($this->mysql);
		}
		
	
	}


?>
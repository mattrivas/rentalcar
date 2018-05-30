<?php
	class DB{
    	private $server_;
    	private $user_;
    	private $password_;
    	private $db_;
    	private $connection;
    	private $result;
    	private $row;
        private static $instance;
    	
    	private function __construct(){
    		require_once "config.php";
    		$this->server_ = $server;
    		$this->user_ = $user;
    		$this->password_ = $password;
    		$this->db_ = $db_name;
                $this->var = false;

    		$this->connection = mysqli_connect($this->server_,$this->user_,$this->password_,$this->db_); 
			if(!$this->connection){
				die("Error en la conexion: ".mysqli_connect_error());
			}
    	}
    	public static function getInstance(){
        	if(self::$instance == NULL){ 
            	self::$instance = new self();
        	}
        return self::$instance;
    	}
		public function disconnect(){
			mysqli_close($this->connection);
		}
		public function getConnection(){
			return $this->connection;
		}
		private function __clone(){ 
        }
		public function execute_query($sql){
			$this->result = mysqli_query($this->connection,$sql);
                        return $this->result;  
		}
		public function getRows($result_){
		    $this->row = mysqli_fetch_assoc($result_);
                return $this->row;
        }
        public function checkRows($result_){
            if(mysqli_num_rows($result_)>0){
                return true;
            }
        return false;
        }
	}
?> 
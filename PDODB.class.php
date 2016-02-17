<?php

class PDODB{
	private $_host;
	private $_port;
	private $_username;
	private $_password;
	private $_charset;
	private $_dbname;
	private $_dsn;
	private $_pdo;
	private $_driver_options;
	private static $_instance;

	private function __construct($config){
		$this->_initParams($config);
		$this->_initDSN();
		$this->_initDriverOptions();
		$this->_initPDO();

	}

	private function __clone(){

	}

	//初始化参数
	private function _initParams($config){
		$this->_host = isset($config['host']) ? $config['host'] : 'localhost';
		$this->_port = isset($config['port']) ? $config['port'] : '3306';
		$this->_username = isset($config['username']) ? $config['username'] : 'root';
		$this->_password = isset($config['password']) ? $config['password'] : '';
		$this->_charset = isset($config['charset']) ? $config['charset'] : 'utf8';
		$this->_dbname = isset($config['dbname']) ? $config['dbname'] : '';
	}

	private function _initDSN(){
		$this->_dsn = "mysql:host=$this->_host;port=$this->_port;dbname=$this->_dbname";
	}

	private function _initDriverOptions(){
		$this->_driver_options = array(
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $this->_charset",
			);
	}

	private function _initPDO(){
		$this->_pdo = new PDO($this->_dsn,$this->_username,$this->_password,$this->_driver_options);
	}

	public static function getInstance($config){
		if(!static::$_instance instanceof static){
			static::$_instance = new static($config);
		}
		return static::$_instance;
	}

	public function query($sql){
		$result=$this->_pdo->query($sql);
		if(!$result){
			$_error_info = $this->_pdo->errorInfo();
			echo ("<br />执行失败。");
			echo "<br />失败的sql语句为：" . $sql;
			echo "<br />出错信息为：" . $_error_info[2];
			echo "<br />错误代号为：" . $_error_info[1];
			die();
		}
		return $result;
	}

	public function getAll($sql){
		$result = $this->_pdo->query($sql);
		$list = $result->fetchAll(PDO::FETCH_ASSOC);
		$result->closeCursor();
		return $list;
	}

	public function getRow($sql){
		$result = $this->_pdo->query($sql);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		$result->closeCursor();
		return $row;
	}

	public function getOne($sql){
		$result = $this->_pdo->query($sql);
		$string = $result->fetchColumn();
		$result->closeCursor();
		return $string;
	}

	public function exec($sql){
		$result = $this->_pdo->exec($sql);
		return $result;
	}

	public function escapeString($data){
		return $this->_pdo->quote($data);
	}

}
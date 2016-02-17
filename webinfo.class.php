<?php
require './PDODB.class.php';	
class webinfo{
	
	private $config;
	private $_dao;

	public function __construct($config){
		$this->config = $config;
		$this->_dao = PDODB::getInstance($config['db']);

	}

	public function getInfo($id){
		$sql = "select * from dos_webinfo where Id=$id";
		$row = $this->_dao->getRow($sql);
		return $row;
	}

	public function getInfoList($index){
		$sql = "select * from dos_webinfo limit $index,20";
	    $_list = $this->_dao->getAll($sql);
	    return $_list;
	}
}
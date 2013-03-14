<?php
class DB {
	protected $_server;
	protected $_user;
	protected $_password;
	protected $_type;
	protected $_database;
	protected $_link;
	protected $_result;
	protected static $_db;
	private static $_instance;
	
	/*
	public function __destruct() {
		$this->disconnect();
	}
	*/
	
	public function __construct() {
		$this->_server = _DB_SERVER_;
		$this->_user = _DB_USER_;
		$this->_password = _DB_PASSWD_;
		$this->_type = _DB_TYPE_;
		$this->_database = _DB_NAME_;
		
		if (!$this->_link = mysql_connect($this->_server, $this->_user, $this->_password))
			die('Невозможно подключится к БД как '.$this->_user.'@'.$this->_server.'. MySQL error: '.mysql_error());
		if (!$this->set_db($this->_database))
			die('БД не найдена. MySQL error: '.mysql_error());
		
		mysql_query('SET NAMES "utf8"', $this->_link);
		mysql_query('SET CHARACTER SET utf8', $this->_link);
	}

	
	public function set_db($db_name) {
		return mysql_select_db($db_name, $this->_link);
	}
	
	/*
	public function	disconnect() {
		if ($this->_link)
			mysql_close($this->_link);
		$this->_link = false;
	}
	*/
	
	public function query($query) {
		$this->_result = false;
		if ($this->_link) {
			$this->_result = mysql_query($query, $this->_link);
			return $this->_result;
		}
		return false;
	}
	
	public function getCell($query) {
		$this->_result = false;
		if ($this->_link AND $this->_result = mysql_query($query.' LIMIT 1', $this->_link) AND is_array($tmpArray = mysql_fetch_assoc($this->_result)))
			return array_shift($tmpArray);
		return false;
	}

	public function getRows($query, $array = true) {
		$this->_result = false;
		if ($this->_link && $this->_result = mysql_query($query, $this->_link)) {
			if (!$array)
				return $this->_result;
			$resultArray = array();
			while ($row = mysql_fetch_assoc($this->_result))
				$resultArray[] = $row;
			return $resultArray;
		}
		return false;
	}
	
	public function	numRows() {
		if ($this->_link AND $this->_result)
			return mysql_num_rows($this->_result);
	}
	
	public function truncate($table) {
		$this->_result = false;
		if ($this->_link) {
			$this->_result = mysql_query('TRUNCATE '.$table);
			return $this->_result;
		}
		return false;
	}
	
	public function insert($table, $values, $limit = false) {
		if (!sizeof($values))
			return true;
		$query = 'INSERT INTO '.$table.' (';
		foreach ($values AS $key => $value)
			$query .= $key.', ';
		$query = rtrim($query, ' ,').') VALUES (';
		foreach ($values AS $key => $value)
			$query .= '"'.$value.'", ';
		$query = rtrim($query, ', ').')';
		if ($limit)
			$query .= ' LIMIT '.intval($limit);
		return $this->query($query);
	}
	
	public function update($table, $values, $where = false, $limit = false) {
		if (!sizeof($values))
			return true;
		$query = 'UPDATE `'.$table.'` SET ';
		foreach ($values AS $key => $value)
			$query .= '`'.$key.'` = \''.$value.'\',';
		$query = rtrim($query, ',');
		if ($where)
			$query .= ' WHERE '.$where;
		if ($limit)
			$query .= ' LIMIT '.intval($limit);
		return $this->query($query);
	}
	
	//INSERT INTO tbl_name (col1,col2) VALUES (col2*2,15);
	//UPDATE persondata SET age=age*2, age=age+1;
	
	
	public function delete($table, $where = false, $limit = false) {
		$this->_result = false;
		if ($this->_link)
			return mysql_query('DELETE FROM `'.pSQL($table).'`'.($where ? ' WHERE '.$where : '').($limit ? ' LIMIT '.intval($limit) : ''), $this->_link);
		return false;
	}
	
}
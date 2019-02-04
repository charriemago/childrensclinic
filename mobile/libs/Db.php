<?php

class DB{

	public static function getHost(){
		return defined('DATABASE_HOST') ? DATABASE_HOST : 'dt0017';
	}

	public static function getUser(){
		return defined('DATABASE_USER') ? DATABASE_USER : 'root';
	}

	public static function getPassword(){
		return defined('DATABASE_PASS') ? DATABASE_PASS : '';
	}

	public static function conn(){
		$conn = new mysqli(self::getHost(), self::getUser(), self::getPassword());
		mysqli_set_charset($conn, "utf8");
		return $conn;
	}

	public static function getDatabase(){

		$database = array();
		$conn = self::conn();
		$res = mysqli_query($conn,'SHOW DATABASES;') or die($conn->error);
		while($row = mysqli_fetch_array($res))
		{
			array_push($database,$row[0]);
		}
		return $database;
	}

	public static function getTables($db){
		$table = array();
		$conn = self::conn();
		$conn->select_db($db);
		$res = mysqli_query($conn, 'SHOW TABLES;') or die($conn->error);
		while($row = mysqli_fetch_array($res))
		{
			array_push($table,$row[0]);
		}

		return $table;

	}	
	public static function getTableStatus($db){
		$table = array();
		$conn = self::conn();
		$res = mysqli_query($conn, 'SHOW TABLE STATUS FROM '.$db.';') or die($conn->error);
	
		while($row = mysqli_fetch_array($res))
		{
			array_push($table,$row);
		}

		return $table;

	}
	public static function load($db,$table,$id){
		$conn = self::conn();
		$conn->select_db($db);

		$sql = 'SELECT * FROM '.$table.' WHERE id = '.$id;
		$result = $conn->query($sql) or die($conn->error);
		$row = $result->fetch_assoc();
		return $row;
	
	}
	public static function selectByColumn($db,$table,$where,$fields = '*'){		
		$conn = self::conn();
		$conn->select_db($db);

		$fieldsWhere = self::fieldsListUpdateWhere($where);
		$typeWhere = self::typeColumns($table,$conn,self::fieldsList($where));
		
		$stmt = $conn->prepare('SELECT '.$fields.' FROM '.$table.' WHERE `'.$fieldsWhere.';');

		$array = array();
		foreach ($where as $key => $value) {
			$array[$key] = &${$key};
		}
		
		call_user_func_array(array($stmt, 'bind_param'), array_merge(array($typeWhere), $array));

		foreach ($array as $key => $value) {
			$array[$key] = $where[$key];
		}

		$stmt->execute();
		$result = $stmt->get_result();
		$arr = array();
		while($row = $result->fetch_assoc()){
			$arr[] = $row;
		}
		return $arr;
	
	}
	public static function querySelect($db,$sql){		
		$conn = self::conn();
		$conn->select_db($db);
		$result = $conn->query($sql) or die($conn->error);
		
		$array = array();
		while($row = $result->fetch_assoc()){
			$array[] = $row;
		}
		return $array;
	
	}
	public static function query($db,$sql){		
		$conn = self::conn();
		$conn->select_db($db);

		if($conn->multi_query($sql) === TRUE){
			// echo 'Success';
		} else {
			echo $conn->error;
		}
	
	}
	public static function loadAll($db,$table,$fields = '*'){

		$conn = self::conn();
		$conn->select_db($db);

		$sql = "SELECT $fields FROM $table";

		$result = $conn->query($sql) or die($conn->error);

		$array = array();
		while($row = $result->fetch_assoc()){
			$array[] = $row;
		}
		return $array;
	
	}
	public static function insert($db,$table,$data){

		$conn = self::conn();
		$conn->select_db($db);

		$fields = self::fieldsList($data);
		$paramQ = self::fieldsQuestionMark($data);
		$type = self::typeColumns($table,$conn, $fields);

		$stmt = $conn->prepare('INSERT INTO '.$table.' ('.$fields.') VALUES ('.$paramQ.');') or die($conn->error);

		$columns = array();
		$dataValue = array();
		foreach($data as $key => $each){
			$columns[] = $key;
			$dataValue[] = $each;
		}

		self::execute($columns,$stmt,$type,$dataValue);
		return mysqli_insert_id($conn);

	}
	public static function update($db,$table,$data, $where = array()){
		$conn = self::conn();
		$conn->select_db($db);

		$fields = self::fieldsListUpdate($data);
		$fieldsWhere = self::fieldsListUpdateWhere($where);

		$columns = array();
		$dataValue = array();
		foreach($data as $key => $each){
			$columns[] = $key;
			$dataValue[] = $each;
		}
		foreach($where as $key => $each){
			$columns[] = $key;
			$dataValue[] = $each;
		}

		$typeField = self::typeColumns($table,$conn,self::fieldsList($data));
		$typeWhere = self::typeColumns($table,$conn,self::fieldsList($where));
		$type = $typeField.$typeWhere;

		$stmt = $conn->prepare('UPDATE '.$table.' SET `'.$fields.' WHERE `'.$fieldsWhere.';') or die($conn->error);

		self::execute($columns,$stmt,$type,$dataValue);
	}
	public static function delete($db,$table,$where = array()){
		$conn = self::conn();	
		$conn->select_db($db);

		$fieldsWhere = self::fieldsListUpdateWhere($where);
		$typeWhere = self::typeColumns($table,$conn,self::fieldsList($where));

		$stmt = $conn->prepare('DELETE FROM '.$table.' WHERE `'.$fieldsWhere.';')  or die($conn->error);
		self::execute($where,$stmt,$typeWhere,$where);

	}
	public static function getColumns($table,$db){	
		$columns = array();
		$conn = self::conn();
		$res = mysqli_query($conn, "SHOW COLUMNS FROM ".$db.".".$table.";");
		while($row = mysqli_fetch_array($res))
		{
			array_push($columns,$row[0]);
		}
		return $columns;
	}
	public static function getColumnsStatus($table,$db){
		$columns = array();
		$conn = self::conn();
		$res = mysqli_query($conn, "SHOW COLUMNS FROM ".$db.".".$table.";");
		while($row = mysqli_fetch_array($res))
		{
			array_push($columns,$row);
		}
		return $columns;
	}
	public static function fieldsList($columns){
		$array = array();
		foreach ($columns as $key => $value) {
			$array[] = $key;
		}
		return '`'.implode('`, `', $array).'`';

	}
	public static function fieldsListUpdate($columns){
		$array = array();
		foreach ($columns as $key => $value) {
			$array[] = $key;
		}
		return implode('` = ?, `',$array)."` = ? ";

	}
	public static function fieldsListUpdateWhere($columns){
		$array = array();
		foreach ($columns as $key => $value) {
			$array[] = $key;
		}
		return implode('` = ? AND `',$array)."` = ? ";

	}
	public static function fieldsQuestionMark($columns){
		$array = array();
		foreach ($columns as $key => $value) {
			$array[$key] = '?';
		}
		return implode(', ', $array);

	}
	public static function typeColumns($table,$conn,$fields = "*"){
		$array = array();
		$strings = array(254,253,254,252,10,12,7,11,13);
		$ints = array(16,1,2,9,3,8);
		$floats = array(4,5,246);

		$query = "SELECT ".$fields." FROM " . $table;

		if($result = $conn->query($query)){
		    while ($columnType = $result->fetch_field()){
		        if(in_array($columnType->type, $strings)){
		        	$array[] = 's';
		        } elseif(in_array($columnType->type, $ints)){
		        	$array[] = 'i';
		        } elseif(in_array($columnType->type, $floats)){
		        	$array[] = 'd';
		        }
		    }
		} else {
			die($conn->error);
		}
		return implode("",$array);
	}
	private static function execute($columns,$stmt,$type,$data){
		$array = array();
		foreach ($columns as $key => $value) {
			$array[$key] = &${$value};
		}
		call_user_func_array(array($stmt, 'bind_param'), array_merge(array($type), $array));
		foreach ($array as $key => $value) {
			$array[$key] = $data[$key];
		}
		$stmt->execute();
	}


}


?>
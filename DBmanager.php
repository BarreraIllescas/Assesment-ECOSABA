<?php

class DBmanager
{
	
	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $db = "db_pasteleria";
	public $conexion;

	public function __construct(){
		$this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db) or die(mysql_error());
		$this->conexion->set_charset("utf8");
	}
		//Funcion de insertar datos
	public function save($table, $datos) {
		$result = $this->conexion->query("INSERT INTO $table VALUES (null, $datos)");
		if($result){
			return true;
		}else {
			return false;
		}
	}
		//Eliminar datos
	public function delete($table, $condicion){
		$result = $this->conexion->query("DELETE FROM $table WHERE $condicion");
		if($result){
			return true;
		} else{
			return false;
		}
	}

		//Funcion para modificar datos
	public function update($table, $campos, $condicion) {
		$result = $this->conexion->query("UPDATE $table SET $campos WHERE $condicion");
		if($result) {
			return true;
		} else{
			return false;
		}
	}
	public function select($table, $condicion) {
		$result = $this->conexion->query("SELECT * FROM $table WHERE $condicion");
		if($result){
			return $result->fetch_all(MYSQLI_ASSOC);
		} else{
			return false;
		}
	}
	public function pastel_ingrediente($condicion) {
		$result = $this->conexion->query("SELECT i.id_ingrediete, i.nombre as ingrediente, i.descripcion, p.nombre as pastel FROM tb_pastel p JOIN tb_pastel_ingrediente pi ON p.id_pastel = pi.id_pastel JOIN tb_ingrediente i ON i.id_ingrediete = pi.id_ingrediente WHERE p.id_pastel = $condicion");
		if($result){
			return $result->fetch_all(MYSQLI_ASSOC);
		} else{
			return false;
		}

	}
	public function save_pi($table, $datos) {
		$result = $this->conexion->query("INSERT INTO $table VALUES ($datos)");
		if($result){
			return true;
		}else {
			return false;
		}
	}
} 
?>
<?php
abstract class PracticaDB {

	private static $server = 'localhost';
	private static $db = 'tarea6';
	private static $user = 'dwes';
	private static $password = 'abc123.';
	private static $port=3306;

	public static function connectDB() {
		try {
			$connection = new PDO("mysql:host=".self::$server.";dbname=".self::$db.";port=".self::$port.";charset=utf8", self::$user, self::$password);
		} 
		catch (PDOException $e) {
			echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
			die ("Error: " . $e->getMessage());
		}
		return $connection;
	}
	public static function cerrarDB($conexion) {
		$conexion = null;
	}

	public static function buscarDB($sql) {
		$conexion = self::connectDB();
		$consulta = $conexion->query($sql);		
	    $resultados = [];
	    while ($registro = $consulta->fetchObject()) {
	      $resultados[] = $registro;
	    }
	    $conexion = null;
	    return $resultados;
	}
}
<?php
	session_start();

	require_once 'PracticaDB.php';
	$conexion = PracticaDB::connectDB();
	
	if(isset($_SESSION["id_usuario"])){
		PracticaDB::cerrarDB($conexion);
		header("Location: cliente.php");
	}
	
	if(!empty($_POST))
	{
		$usuario = $_POST['usuario'];
		$password = MD5($_POST['password']);
		$error = '';
		$sql = "SELECT usuario FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$password'";
		$result=$conexion->query($sql);
		$rows = $result->fetchColumn();
		echo $rows;
		if($rows) {
			echo "dentro";
			$row = $result->fetch(PDO::FETCH_ASSOC);
			echo $row['contrasena'];
			$_SESSION['id_usuario'] = $row['usuario'];
			header("location: cliente.php");
			} else {
			$error = "El nombre o contraseña son incorrectos";
		}
	}
?>
<html>
	<head>
		<title>Login</title>
	</head>
	
	<body>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" > 
			<div><label>Usuario:</label><input id="usuario" name="usuario" type="text" ></div>
			<br />
			<div><label>Password:</label><input id="password" name="password" type="password"></div>
			<br />
			<div><input name="login" type="submit" value="Login"></div> 
		</form> 
		
		<br />
		
		<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
	</body>
</html>
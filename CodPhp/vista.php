<!DOCTYPE html>
<html>
	<head>
		<title>Servicio</title>
		<meta charset="utf-8">
	</head>
	<body>
		<form action="../Controller/logoff.php" method="post">
			<p> Usuario: <?php echo $_SESSION["usuario"] ?> <input type="submit" name="logoff" value="Logoff"></p>
		</form>
		<h1>¿Qué desea consultar?</h1>
		<h3>Productos</h3>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
			<select name="productos">
				<?php
					foreach ($codigos_pro as $row) {
						echo "<option value='" . $row->cod . "'>" . $row->nombre_corto . "</option>";
					}
				?>
			</select>
			<h3>Tiendas</h3>
			<select name="tiendas">
				<?php
					foreach ($codigos_tin as $row) {
						echo "<option value='" . $row->cod . "'>" . $row->nombre . "</option>";
					}
				?>
			</select>
			<h3>Familias</h3>
			<select name="familias">
				<?php
					foreach ($codigos_fam as $row) {
						echo "<option value='" . $row->cod . "'>" . $row->nombre . "</option>";
					}
				?>
			</select>
			<br>
			<br>
			<button type="submit" name="pvp" value="pvp">Obtener PVP</button>
			<button type="submit" name="stock" value="stock">Stock disponible</button>
			<button type="submit" name="fullFam" value="fullFam">Todas las familias</button>
			<button type="submit" name="proFam" value="proFam">Productos de una familia</button>
		</form>
		<div>
			<?php
				echo $resultado;
			?>
		</div>
	</body>
</html>
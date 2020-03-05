<?php
	session_start();
	require_once 'PracticaDB.php';
	$cliente = new SoapClient("http://localhost/practicaUD6/conWSDL/Producto.wsdl");
	$codigos_pro = PracticaDB::buscarDB("SELECT cod, nombre_corto FROM producto");
	$codigos_tin = PracticaDB::buscarDB("SELECT cod, nombre FROM tienda");
	$codigos_fam = PracticaDB::buscarDB("SELECT cod, nombre FROM familia");
	if(isset($_POST['pvp'])) {
		$pvp = $cliente->getPVP($_POST['productos']);
		$resultado = "<p>El producto cuesta: <strong>" . $pvp[0]->PVP . "€</strong></p>";
	} elseif (isset($_POST['stock'])) {
		$stock = $cliente->getStock($_POST['productos'], $_POST['tiendas']);
		$resultado = "<p>La tienda " . $_POST['tiendas'] . " tiene un stock de <strong>" . $stock[0]->unidades . " unidades </strong> del producto " . $_POST['productos'] . "</p>";
	} elseif (isset($_POST['fullFam'])) {
		$familias = $cliente->getFamilias();
		$resultado = "Códigos de las familias: ";

		foreach ($familias as $row) {
			$resultado .= "<br>" . $row->cod;
		}
	} elseif (isset($_POST['proFam'])) {
		$productoFam = $cliente->getProductosFamilia($_POST['familias']);
		$resultado = "Productos de la familia " . $_POST['familias'] . ": ";
		foreach ($productoFam as $row) {
			$resultado .= "<br>" . $row->cod;
		}
	}
	include 'vista.php';
?>
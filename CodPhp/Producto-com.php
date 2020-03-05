<?php

require_once 'PracticaDB.php';
/**
 * undocumented class
 *
 * @package default
 * @author 
 **/ 
class Producto {

  /**
   * @param string $producto
   * @return array
  */

  public function getPVP($producto) {
    $pvp = PracticaDB::buscarDB("SELECT PVP from producto where cod = '$producto'");
    return $pvp;
  }

  /**
   * @param string $producto
   * @param int $tienda
   * @return array
  */

  public function getStock($producto, $tienda) {
    $stock = PracticaDB::buscarDB("SELECT unidades from stock where producto = '$producto' AND tienda = $tienda");
    return $stock;
  }

  /**
   * @return array
  */

  public function getFamilias() {
    $familias = PracticaDB::buscarDB("SELECT cod from familia");
    return $familias;
  }

  /**
   * @param string $familia
   * @return array
  */

  public function getProductosFamilia($familia) {
    $familias = PracticaDB::buscarDB("SELECT cod from producto where familia = '$familia'");
    return $familias;
   }
}
?>
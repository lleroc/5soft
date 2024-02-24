<?php
  //TODO: Requerimientos 
require_once('../config/conexion.php');

class HistorialTareas {
  public function todos() {
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "select h.HistorialID, h.EstadoAnterior, h.EstadoNuevo, h.FechaCambio from historialtareas h";
    $datos = mysqli_query($con, $cadena);
    $con->close();
    return $datos;
  }
}
?>
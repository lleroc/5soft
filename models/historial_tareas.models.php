<?php
  //TODO: Requerimientos 
require_once('../config/conexion.php');

class HistorialTareas {
  public function todos() {
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "select * from historialtareas";
    $datos = mysqli_query($con, $cadena);
    return $datos;
    $con->close();
  }

  public function insert($TareaID, $EstadoAnterior, $EstadoNuevo) {
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "insert into historialtareas (TareaID, EstadoAnterior, EstadoNuevo) values('$TareaID','$EstadoAnterior','$EstadoNuevo')";

    if (mysqli_query($con, $cadena)) {
      $con->close();
      return "ok";
  } else {
      return mysqli_error($con);
  }
  }
}
?>
<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');

class HistorialTareas {
  public function todos() {
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $cadena = "select * from historialtareas";
    $datos = mysqli_query($con, $cadena);
    $con->close();
    return $datos;
  }

  public function insertar($TareaID, $EstadoAnterior, $EstadoNuevo) {
    $con = new ClaseConectar();
    $con = $con->ProcedimientoConectar();
    $TareaID = mysqli_real_escape_string($con, $TareaID); // Escapar el valor para evitar inyección de SQL
    $EstadoAnterior = mysqli_real_escape_string($con, $EstadoAnterior); // Escapar el valor para evitar inyección de SQL
    $EstadoNuevo = mysqli_real_escape_string($con, $EstadoNuevo); // Escapar el valor para evitar inyección de SQL
    $cadena = "INSERT INTO historialtareas(TareaID, EstadoAnterior, EstadoNuevo) VALUES ('$TareaID', '$EstadoAnterior', '$EstadoNuevo')";

    if (mysqli_query($con, $cadena)) {
      $con->close();
      return "ok";
    } else {
      $con->close();
      return "Error al insertar datos: " . mysqli_error($con);
    }
  }
}
?>

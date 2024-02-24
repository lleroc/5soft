<?php

require_once("../config/cors.php");
require_once("../models/historial_tareas.models.php");
error_reporting(0);

$HistorialTareas = new HistorialTareas;

switch($_GET["op"]){

    case "todos":
      $datos = array();
      $datos = $HistorialTareas->todos();
      while($row = mysqli_fetch_assoc($datos)) {
        $todos[] = $row;
      }

      echo json_encode($todos);
    break;
    case 'insertar':
      $TareaID = $_POST["TareaID"];
      $EstadoAnterior = $_POST["EstadoAnterior"];
      $EstadoNuevo = $_POST["EstadoNuevo"];
      $datos = array();
      $datos = $HistorialTareas->insertar($TareaID, $EstadoAnterior, $EstadoNuevo);
      echo json_encode($datos);
      break;
}

?>
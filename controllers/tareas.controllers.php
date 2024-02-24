<?php
error_reporting(0);
//TODO: Requerimientos 
require_once('../config/sesiones.php');
require_once("../models/tareas.models.php");
require_once("../models/proyectos.models.php");

$Tareas = new Tareas;
$Proyectos = new Proyectos;

switch ($_GET["op"]) {
       
    case 'todos':
        $datos = array();
        $datos = $Tareas->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        
    case 'uno':
        $TareaID = $_POST["TareaID"];
        $datos = array();
        $datos = $Tareas->uno($TareaID);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        
    case 'insertar':
        $Descripcion = $_POST["Descripcion"];
        $FechaCreacion = $_POST["FechaCreacion"];
        $FechaVencimiento = $_POST["FechaVencimiento"];
        $Estado = $_POST["Estado"];
        $ProyectoID = $_POST["ProyectoID"]; // Agregado: Obtener el ProyectoID de la tarea
        $datos = array();
        // Pasar el ProyectoID al método Insertar
        $datos = $Tareas->Insertar($Descripcion, $FechaCreacion, $FechaVencimiento, $Estado, $ProyectoID);
        echo json_encode($datos);
        break;
       
    case 'actualizar':
        $Descripcion = $_POST["Descripcion"];
        $FechaCreacion = $_POST["FechaCreacion"];
        $FechaVencimiento = $_POST["FechaVencimiento"];
        $Estado = $_POST["Estado"];
        $TareaID = $_POST["TareaID"];
        $datos = array();
        $datos = $Tareas->Actualizar($TareaID, $Descripcion, $FechaCreacion, $FechaVencimiento, $Estado);
        echo json_encode($datos);
        break;
        
    case 'eliminar':
        $Tareas = $_POST["TareaID"];
        $datos = array();
        $datos = $Tareas->Eliminar($TareaID);
        echo json_encode($datos);
        break;
}
?>

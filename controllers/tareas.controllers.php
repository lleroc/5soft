<?php
error_reporting(0);
//TODO: Requerimientos 
require_once('../config/sesiones.php');
require_once("../models/tareas.models.php");
$Tareas = new Tareas;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $Tareas->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $TareaID = $_POST["TareaID"];
        $datos = array();
        $datos = $Tareas->uno($TareaID);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $Descripcion = $_POST["Descripcion"];
        $FechaCreacion = $_POST["FechaCreacion"];
        $FechaVencimiento = $_POST["FechaVencimiento"];
        $Estado = $_POST["Estado"];
        $datos = array();
        $datos = $Tareas->Insertar($Descripcion, $FechaCreacion, $FechaVencimiento, $Estado);
        echo json_encode($datos);
        break;
        //TODO: Procedimiento para actualizar 
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
        //TODO: Procedimiento para eliminar 
    case 'eliminar':
        $Tareas = $_POST["TareaID"];
        $datos = array();
        $datos = $Tareas->Eliminar($TareaID);
        echo json_encode($datos);
        break;
}

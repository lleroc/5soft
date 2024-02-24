<?php
error_reporting(0);
require_once("../models/comentarios.models.php");
require_once("../config/cors.php");
require_once("../config/sesiones.php");
$Comentarios = new Comentarios;


switch($_GET["op"]){
    case "todos":
        $datos = array();
        $datos = $Comentarios->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
    break;
    case "todosUsuarios":
        
        $UsuarioID = $_GET["UsuarioID"];
        $datos = array();
        $datos = $Comentarios->todosUsuarios($UsuarioID);
        while ($row = mysqli_fetch_assoc($datos)) {
            $todosUsuarios[] = $row;
        }
        echo json_encode($todosUsuarios);
    break;
    case "todosTareas":
        $TareaID = $_GET["TareaID"];
        $datos = array();
        $datos = $Comentarios->todosTareas($TareaID);
        while ($row = mysqli_fetch_assoc($datos)) {
            $todosUsuarios[] = $row;
        }
        echo json_encode($todosUsuarios);
    break;
    case "InsertarUsuarios":
        $Contenido = $_POST["Contenido"];
        $TareaID = $_POST["TareaID"];
        $UsuarioID = $_POST["UsuarioID"];
        $datos = array();
        $datos = $Comentarios->InsertarUsuarios($Contenido, $TareaID, $UsuarioID);
        echo json_encode($datos);
    break;
    case "InsertarTareas":
        $Contenido = $_POST["Contenido"];
        $FechaCreacion = $_POST["FechaCreacion"];
        $TareaID = $_POST["TareaID"];
        $UsuarioID = $_POST["UsuarioID"];
        $datos = array();
        $datos = $Comentarios->InsertarTareas($Contenido, $TareaID, $UsuarioID);
        echo json_encode($datos);
    break;
    case "Actualizar":
        $ComentarioID = $_POST["ComentarioID"];
        $Contenido = $_POST["Contenido"];
        $FechaCreacion = $_POST["FechaCreacion"];
        $TareaID = $_POST["TareaID"];
        $UsuarioID = $_POST["UsuarioID"];
        $datos = $Comentarios->Actualizar($ComentarioID,$Contenido,$FechaCreacion, $TareaID, $UsuarioID);
        echo json_encode($datos);
    break;
    case "eliminar":
        $ComentarioID = $_POST["ComentarioID"];
        $datos = $Comentarios->Eliminar($ComentarioID);
        echo json_encode($datos);
    break;


}
<?php
error_reporting(0);
require_once('../models/notificaciones.models.php');
$Notificaciones = new Notificaciones;

switch ($_GET["op"]) {
    /* Procedimiento para listar todas las notificaciones */
    case 'todos':
        $datos = array();
        $datos = $Notificaciones->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    /* Procedimiento para obtener una notificación por su ID */
    case "unoconNotificacionID":
        $NotificacionID = $_POST["NotificacionID"];
        $datos = array();
        $datos = $Notificaciones->unoconNotificacionID($NotificacionID);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    /* Procedimiento para obtener una notificación por su contenido */
    case "unoconContenido":
        $Contenido = $_POST["Contenido"];
        $datos = array();
        $datos = $Notificaciones->unoconContenido($Contenido);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    /* Procedimiento para insertar una nueva notificación */
    case 'insertar':
        $Contenido = $_POST["Contenido"];
        $FechaCreacion = $_POST["FechaCreacion"];
        $UsuarioID = $_POST["UsuarioID"];
        $datos = array();
        $datos = $Notificaciones->insertar($Contenido, $FechaCreacion, $UsuarioID);
        echo json_encode($datos);
        break;

    /* Procedimiento para actualizar una notificación */
    case 'actualizar':
        $NotificacionID = $_POST["NotificacionID"];
        $Contenido = $_POST["Contenido"];
        $FechaCreacion = $_POST["FechaCreacion"];
        $UsuarioID = $_POST["UsuarioID"];
        $datos = array();
        $datos = $Notificaciones->actualizar($NotificacionID, $Contenido, $FechaCreacion, $UsuarioID);
        echo json_encode($datos);
        break;

    /* Procedimiento para eliminar una notificación */
    case 'eliminar':
        $NotificacionID = $_POST["NotificacionID"];
        $datos = array();
        $datos = $Notificaciones->eliminar($NotificacionID);
        echo json_encode($datos);
        break;
}
?>

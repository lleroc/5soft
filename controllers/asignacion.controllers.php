<?php

error_reporting(0);


require_once('../models/asignaciones.models.php');
$Asignaciones = new Asignaciones();


switch ($_GET['op']) {
    case 'todos':
        
        $datos = $Asignaciones->todos();
       
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        
        echo json_encode($todos);
        break;
    case 'insertar':
        
        $TareaID = $_POST['TareaID'];
        $UsuarioID = $_POST['UsuarioID'];
        
        $datos = $Asignaciones->insertar($TareaID, $UsuarioID);
        
        echo json_encode($datos);
        break;
    case 'actualizar':
        $AsignacionID = $_POST['AsignacionID'];
        $TareaID = $_POST['TareaID'];
        $UsuarioID = $_POST['UsuarioID'];
        $datos = $Asignaciones->actualizar($AsignacionID, $TareaID, $UsuarioID);
        
        echo json_encode($datos);
        break;
    case 'eliminar':
        
        $AsignacionID = $_POST['AsignacionID'];
        
        $datos = $Asignaciones->eliminar($AsignacionID);
        echo json_encode($datos);
        break;
}

?>

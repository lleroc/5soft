<?php

error_reporting(0);

require_once('../models/usuarios.models.php');
$Usuarios = new Usuarios();

switch ($_GET['op']) {
    case 'todos':
        $datos = $array();
        $datos = $Usuarios->todos();
        while($row = mysqli_fetch_assoc($datos)){
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno':
        $UserID = $_POST['UserID'];
        $datos = $array();
        $datos = $Usuarios->uno($UserID);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case 'insertar':
        $UserID = $_POST['UserID'];
        $Nombre = $_POST['Nombre'];
        $CorreoElectronico = $_POST['CorreoElectronico'];
        $Clave = $_POST['Clave'];
        $RolID = $_POST['RolID'];
        $datos = $array();
        $datos = $Usuarios->insertar($UserID, $Nombre, $CorreoElectronico, $Clave, $RolID);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $UserID = $_POST['UserID'];
        $Nombre = $_POST['Nombre'];
        $CorreoElectronico = $_POST['CorreoElectronico'];
        $Clave = $_POST['Clave'];
        $RolID = $_POST['RolID'];
        $datos = $array();
        $datos = $Usuarios->actualizar($UserID, $Nombre, $CorreoElectronico, $Clave, $RolID);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $UserID = $_POST['UserID'];
        $datos = $array();
        $datos = $Usuarios->eliminar($UserID);
        echo json_encode($datos);
        break;
}

?>
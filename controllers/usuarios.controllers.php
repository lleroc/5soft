<?php

error_reporting(0);
require_once('../config/sesiones.php');
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
        case 'login':
            $correo = $_POST['correo'];
            $contrasenia = $_POST['contrasenia'];
    
            //TODO: Si las variables estab vacias rgersa con error
            if (empty($correo) or  empty($contrasenia)) {
                header("Location:../login.php?op=2");
                exit();
            }
    
            try {
                $datos = array();
                $datos = $Usuarios->login($correo, $contrasenia);
                $res = mysqli_fetch_assoc($datos);
            } catch (Throwable $th) {
                header("Location:../login.php?op=1");
                exit();
            }
            //TODO:Control de si existe el registro en la base de datos
            try {
                if (is_array($res) and count($res) > 0) {
                    //if ((md5($contrasenia) == ($res["Contrasenia"]))) {
                    if ((($contrasenia) == ($res["Contrasenia"]))) {
                        //$datos2 = array();
                        // $datos2 = $Accesos->Insertar(date("Y-m-d H:i:s"), $res["idUsuarios"], 'ingreso');
    
                        $_SESSION["Usuarios_UserID"] = $res["UserID"];
                        $_SESSION["Usuarios_Nombre"] = $res["Nombres"];
                        
                        $_SESSION["Usuarios_Correo"] = $res["Correo"];
                        $_SESSION["Usuario_IdRoles"] = $res["idRoles"];
                        $_SESSION["Rol"] = $res["Rol"];
    
    
    
                        header("Location:../views/home.php");
                        exit();
                    } else {
                        header("Location:../login.php?op=1");
                        exit();
                    }
                } else {
                    header("Location:../login.php?op=1");
                    exit();
                }
            } catch (Exception $th) {
                echo ($th->getMessage());
            }
            break;    
}

?>
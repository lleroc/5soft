<?php
error_reporting(0);
require_once('../models/usuario_roles.models.php');
$Usuario_Roles = new Usuario_Roles;

switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los roles */
    case 'todos':
        $datos = array();
        $datos = $Usuario_Roles->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un rol */

    // case "unoconRolID":
    //     $RolID = $_POST["RolID"];
    //     $datos = array();
    //     $datos = $Roles->unoconRolID($RolID);
    //     $res = mysqli_fetch_assoc($datos);
    //     echo json_encode($res);
    //     break;
    // case "unoconNombre_Rol":
    //     $Nombre_Rol = $_POST["Nombre_Rol"];
    //     $datos = array();
    //     $datos = $Roles->unoconNombre_Rol($Nombre_Rol);
    //     $res = mysqli_fetch_assoc($datos);
    //     echo json_encode($res);
    //     break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $RolID = $_POST["RolID"];
        $UsuarioID = $_POST["UsuarioID"];
        $datos = array();
        $datos = $Usuario_Roles->Insertar($RolID,$UsuarioID);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $RolID = $_POST["RolID"];
        $UsuarioID = $_POST["UsuarioID"];
        $RolUsuarioRelacionID = $_POST['RolUsuarioRelacionID'];
        $datos = array();
        $datos = $Usuario_Roles->Actualizar($RolID, $UsuarioID, $RolUsuarioRelacionID);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $RolUsuarioRelacionID = $_POST["RolUsuarioRelacionID"];
        $datos = array();
        $datos = $Usuario_Roles->Eliminar($RolUsuarioRelacionID);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para insertar */
    // case 'login':
    //     header("Location:../login.php?op=2");
    //     return;
    //     $CorreoElectronico = $_POST['CorreoElectronico'];
    //     $clave = $_POST['clave'];

    //     //TODO: Si las variables estab vacias regresa con error
    //     if (empty($CorreoElectronico) or  empty($clave)) {
    //         header("Location:../login.php?op=2");
    //         exit();
    //     }

    //     try {
    //         $datos = array();
    //         $datos = $Usuarios->login($CorreoElectronico, $clave);
    //         $res = mysqli_fetch_assoc($datos);
    //     } catch (Throwable $th) {
    //         header("Location:../login.php?op=1");
    //         exit();
    //     }
    //     //TODO:Control de si existe el registro en la base de datos
    //     try {
    //         if (is_array($res) and count($res) > 0) {
    //             //if ((md5($clave) == ($res["clave"]))) {
    //             if ((($clave) == ($res["Clave"]))) {            
    //                 //$datos2 = array();
    //                 // $datos2 = $Accesos->Insertar(date("Y-m-d H:i:s"), $res["idUsuarios"], 'ingreso');

    //                 $_SESSION["idUsuarios"] = $res["idUsuarios"];
    //                 $_SESSION["Usuarios_Nombres"] = $res["Nombres"];
    //                 $_SESSION["Usuarios_Apellidos"] = $res["Apellidos"];
    //                 $_SESSION["Usuarios_Correo"] = $res["Correo"];
    //                 $_SESSION["Usuario_IdRoles"] = $res["idRoles"];
    //                 $_SESSION["Rol"] = $res["Rol"];



    //                 header("Location:../views/home.php");
    //                 exit();
    //             } else {
    //                 header("Location:../login.php?op=1");
    //                 exit();
    //             }
    //         } else {
    //             header("Location:../login.php?op=1");
    //             exit();
    //         }
    //     } catch (Exception $th) {
    //         echo ($th->getMessage());
    //     }
    //     break;
}

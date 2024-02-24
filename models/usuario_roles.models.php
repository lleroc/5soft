<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class Usuario_Roles
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `rolusuariorelacion`";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }

    /*TODO: Procedimiento para sacar un registro*/
    public function uno($idUsuario)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM rolusuariorelacion WHERE usuarioid = $idUsuario";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($Usuarios_idUsuarios, $Roles_idRoles)
    {


        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into rolusuariorelacion(`RolID`, `UsuarioID`) values ( $Usuarios_idUsuarios,  $Roles_idRoles )";

        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
        $con->close();
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($Roles_idRoles,$Usuarios_idUsuarios,$IdRolUsuarioRelacionID)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update rolusuariorelacion set RolID=$Roles_idRoles, UsuarioID =$Usuarios_idUsuarios where RolUsuarioRelacionID= $IdRolUsuarioRelacionID";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
        $con->close();
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($Usuarios_idUsuarios)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `rolusuariorelacion` WHERE `RolUsuarioRelacionID`= $Usuarios_idUsuarios";

        if (mysqli_query($con, $cadena)) {
            return 'ok';
        } else {
            return false;
        }
        $con->close();
    }
}

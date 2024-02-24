<?php

require_once ('../config/conexion.php');

class Usuarios{
    //Procedimiento para obtener todos los usuarios
    public function todos(){
        $con= new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT Usuarios.UserID, Usuarios.Nombre, Usuarios.CorreoElectronico, Usuarios.Clave, Roles.Nombre_Rol FROM Usuarios INNER JOIN Roles ON Usuarios.RolID = Roles.RolID";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    //Procedimiento para obtener un usuario
    public function uno($UserID){

        $con= new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT Usuarios.UserID, Usuarios.Nombre, Usuarios.CorreoElectronico, Usuarios.Clave, Roles.Nombre_Rol WHERE UserID = '$UserID'";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    //Procedimiento para insertar un usuario
    public function insertar($Nombre, $CorreoElectronico, $Clave, $RolID){
        $con= new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO Usuarios(Nombre, CorreoElectronico, Clave, RolID) VALUES('$Nombre', '$CorreoElectronico', '$Clave', '$RolID')";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    //Procedimiento para actualizar un usuario
    public function actualizar($UserID, $Nombre, $CorreoElectronico, $Clave, $RolID){
        $con= new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE Usuarios SET Nombre = '$Nombre', CorreoElectronico = '$CorreoElectronico', Clave = '$Clave', RolID = '$RolID' WHERE UserID = '$UserID'";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    //Procedimiento para eliminar un usuario
    public function eliminar($UserID){
        $con= new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM Usuarios WHERE UserID = '$UserID'";
        $datos = mysqli_query($con, $cadena);
        if($datos){
            return true;
        }else{
            return false;
        }
    
    }
    public function login($Correo)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
<<<<<<< HEAD
            $cadena = "SELECT u.UserID, u.Nombre, u.CorreoElectronico, u.RolID from usuarios u INNER JOIN rolusuariorelacion r on r.UsuarioID = u.UserID INNER JOIN Roles ro ON ro.RolID = r.RolID WHERE `CorreoElectronico`='$Correo'";
=======
            $cadena = "SELECT Usuarios.UserID, Usuarios.Nombre, Usuarios.CorreoElectronico, Usuarios.Clave, Roles.RolID, Roles.RolID, from Usuarios INNER JOIN rolusuariorelacion on Usuarios.UserID = rolusuariorelacion.Usuarios_UserID INNER JOIN Roles ON rolusuariorelacion.Roles_RolID = Roles.RolID WHERE `Correo`='$Correo'";
>>>>>>> 4ec642b47035df028b3587f9a486a7b2aa9a0137
            $datos = mysqli_query($con, $cadena);
            return $datos;
        } catch (Throwable $th) {
            return $th->getMessage();
        }
        $con->close();
    }
    

}

?>
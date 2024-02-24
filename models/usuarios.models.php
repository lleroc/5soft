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
    

}

?>
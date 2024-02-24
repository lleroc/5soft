<?php

require_once('../config/conexion.php');

class Asignaciones {
    
    public function todos() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM asignaciones";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }

    
    public function insertar($TareaID, $UsuarioID) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO asignaciones (TareaID, UsuarioID) VALUES ('$TareaID', '$UsuarioID')";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }

   
    public function actualizar($AsignacionID, $TareaID, $UsuarioID) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE asignaciones SET TareaID = '$TareaID', UsuarioID = '$UsuarioID' WHERE AsignacionID = '$AsignacionID'";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }

    
    public function eliminar($AsignacionID) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM asignaciones WHERE AsignacionID = '$AsignacionID'";
        $datos = mysqli_query($con, $cadena);
        if ($datos) {
            return true;
        } else {
            return false;
        }
    }
}

?>

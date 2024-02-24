<?php
require_once('../config/conexion.php');
class Tareas
{
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * from tareas;";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($TareaID)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM tareas WHERE tareas.TareaID = $TareaID;";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function Insertar($Descripcion, $FechaCreacion, $FechaVencimiento, $Estado)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `tareas`(`Descripcion`, `FechaCreacion`, `FechaVencimiento`, `Estado`) VALUES('$Descripcion','$FechaCreacion','$FechaVencimiento','$Estado')";

        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return mysqli_error($con);
        }
        $con->close(); 
    }


    public function Actualizar($Descripcion, $FechaCreacion, $FechaVencimiento, $Estado, $TareaID)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE  `tareas` SET Descripcion='$Descripcion',FechaCreacion='$FechaCreacion',FechaVencimiento='$FechaVencimiento',Estado='$Estado' where TareaID= $TareaID";
        if (mysqli_query($con, $cadena)) {
            return ($TareaID);
        } else {
            return 'error al actualizar el registro';
        }
        $con->close();
    }

    public function Eliminar($TareaID)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM  `tareas` WHERE TareaID = $TareaID";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
        $con->close();
    }

}
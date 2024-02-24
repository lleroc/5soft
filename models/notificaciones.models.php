<?php
require_once('../config/conexion.php');

class Notificaciones
{
    /* Procedimiento para sacar todos los registros */
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Notificaciones`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    /* Procedimiento para sacar un registro */
    public function uno($idNotificacion)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM Notificaciones WHERE NotificacionID = $idNotificacion";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    /* Procedimiento para insertar */
    public function Insertar($Contenido, $FechaCreacion, $UsuarioID)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO Notificaciones (Contenido, FechaCreacion, UsuarioID) VALUES ('$Contenido', '$FechaCreacion', $UsuarioID)";
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $con->close();
            return 'Error al insertar en la base de datos';
        }
    }

    /* Procedimiento para actualizar */
    public function Actualizar($NotificacionID, $Contenido, $FechaCreacion, $UsuarioID)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE Notificaciones SET Contenido='$Contenido', FechaCreacion='$FechaCreacion', UsuarioID=$UsuarioID WHERE NotificacionID=$NotificacionID";
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $con->close();
            return 'Error al actualizar el registro';
        }
    }

    /* Procedimiento para Eliminar */
    public function Eliminar($NotificacionID)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM Notificaciones WHERE NotificacionID=$NotificacionID";
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return 'ok';
        } else {
            $con->close();
            return false;
        }
    }
}
?>

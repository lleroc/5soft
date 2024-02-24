<?php
require_once('../config/conexion.php');

class ArchivoTareaRelacion
{
    /* Insertar una nueva relación entre archivo y tarea */
    public function Insertar($ArchivoTareaRelacionID, $ArchivoID, $TareaID)
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO ArchivoTareaRelacion (ArchivoTareaRelacionID, ArchivoID, TareaID) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($conn, $cadena);
        mysqli_stmt_bind_param($stmt, 'iii', $ArchivoTareaRelacionID, $ArchivoID, $TareaID);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    /* Obtener todas las relaciones entre archivo y tarea */
    public function todas()
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM ArchivoTareaRelacion";

        $resultados = mysqli_query($conn, $cadena);
        return $resultados;
    }

    /* Obtener una sola relación entre archivo y tarea por ID */
    public function uno($ArchivoTareaRelacionID)
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM ArchivoTareaRelacion WHERE ArchivoTareaRelacionID = ?";

        $stmt = mysqli_prepare($conn, $cadena);
        mysqli_stmt_bind_param($stmt, 'i', $ArchivoTareaRelacionID);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $relacion = mysqli_fetch_assoc($resultado);

        mysqli_stmt_close($stmt);
        return $relacion;
    }

    /* Actualizar una relación entre archivo y tarea */
    public function Actualizar($ArchivoTareaRelacionID, $ArchivoID, $TareaID)
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "UPDATE ArchivoTareaRelacion SET ArchivoID = ?, TareaID = ? WHERE ArchivoTareaRelacionID = ?";

        $stmt = mysqli_prepare($conn, $cadena);
        mysqli_stmt_bind_param($stmt, 'iii', $ArchivoID, $TareaID, $ArchivoTareaRelacionID);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $resultado;
    }

    /* Eliminar una relación entre archivo y tarea */
    public function Eliminar($ArchivoTareaRelacionID)
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM ArchivoTareaRelacion WHERE ArchivoTareaRelacionID = ?";

        $stmt = mysqli_prepare($conn, $cadena);
        mysqli_stmt_bind_param($stmt, 'i', $ArchivoTareaRelacionID);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $resultado;
    }
}
?>
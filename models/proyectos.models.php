<?php
require_once('../config/conexion.php');

class Proyectos
{
    /* Insertar un nuevo proyecto */
    public function Insertar($NombreDelProyecto, $Descripcion, $FechaDeInicio, $FechaDeFinalizacion)
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO Proyectos (NombreDelProyecto, Descripcion, FechaDeInicio, FechaDeFinalizacion) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $cadena);
        mysqli_stmt_bind_param($stmt, 'ssss', $NombreDelProyecto, $Descripcion, $FechaDeInicio, $FechaDeFinalizacion);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    /* Obtener todos los proyectos */
    public function todos()
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM Proyectos";

        $resultados = mysqli_query($conn, $cadena);
        return $resultados;
    }

    /* Obtener un solo proyecto por ID */
    public function uno($ProyectoID)
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM Proyectos WHERE ProyectoID = ?";

        $stmt = mysqli_prepare($conn, $cadena);
        mysqli_stmt_bind_param($stmt, 'i', $ProyectoID);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $proyecto = mysqli_fetch_assoc($resultado);

        mysqli_stmt_close($stmt);
        return $proyecto;
    }

    /* Actualizar un proyecto */
    public function Actualizar($ProyectoID, $NombreDelProyecto, $Descripcion, $FechaDeInicio, $FechaDeFinalizacion)
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "UPDATE Proyectos SET NombreDelProyecto = ?, Descripcion = ?, FechaDeInicio = ?, FechaDeFinalizacion = ? WHERE ProyectoID = ?";

        $stmt = mysqli_prepare($conn, $cadena);
        mysqli_stmt_bind_param($stmt, 'ssssi', $NombreDelProyecto, $Descripcion, $FechaDeInicio, $FechaDeFinalizacion, $ProyectoID);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $resultado;
    }

    /* Eliminar un proyecto */
    public function Eliminar($ProyectoID)
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM Proyectos WHERE ProyectoID = ?";

        $stmt = mysqli_prepare($conn, $cadena);
        mysqli_stmt_bind_param($stmt, 'i', $ProyectoID);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $resultado;
    }
}

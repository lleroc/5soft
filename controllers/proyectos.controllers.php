<?php
error_reporting(0);
// Requerimientos
require_once('../config/config.php');
require_once("../models/proyectos.models.php");
require_once("../models/usuarios.models.php"); 

$Proyectos = new Proyectos;

switch ($_GET["op"]) {
    // Listar todos los proyectos
    case 'todos':
        $datos = $Proyectos->todos();
        $todos = array();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    // Obtener un proyecto por su ID
    case 'uno':
        $ProyectoID = $_POST["ProyectoID"];
        $datos = $Proyectos->uno($ProyectoID);
        echo json_encode($datos);
        break;

    // Insertar un nuevo proyecto
    // Insertar un nuevo proyecto
case 'insertar':
    $NombreDelProyecto = $_POST["NombreDelProyecto"];
    $Descripcion = $_POST["Descripcion"];
    $FechaDeInicio = $_POST["FechaDeInicio"];
    $FechaDeFinalizacion = $_POST["FechaDeFinalizacion"];
    
    // Insertar el proyecto y obtener su ID
    $resultado = $Proyectos->Insertar($NombreDelProyecto, $Descripcion, $FechaDeInicio, $FechaDeFinalizacion);
    if ($resultado == "ok") {
        $ProyectoID = $Proyectos->obtenerUltimoID(); // Obtener el ID del último proyecto insertado
        // Obtener las tareas asociadas al proyecto desde el formulario
        $tareas = isset($_POST["TareaID"]) ? $_POST["TareaID"] : array();
        // Asociar las tareas al proyecto en la tabla proyectorelacion
        $Proyectos->asociarTareasAProyecto($ProyectoID, $tareas);
    }
    echo json_encode($resultado);
    break;

    // Actualizar un proyecto existente
    case 'actualizar':
        $ProyectoID = $_POST["ProyectoID"];
        $NombreDelProyecto = $_POST["NombreDelProyecto"];
        $Descripcion = $_POST["Descripcion"];
        $FechaDeInicio = $_POST["FechaDeInicio"];
        $FechaDeFinalizacion = $_POST["FechaDeFinalizacion"];
        $resultado = $Proyectos->Actualizar($ProyectoID, $NombreDelProyecto, $Descripcion, $FechaDeInicio, $FechaDeFinalizacion);
        echo json_encode($resultado);
        break;

    // Eliminar un proyecto
    case 'eliminar':
        $ProyectoID = $_POST["ProyectoID"];
        $resultado = $Proyectos->Eliminar($ProyectoID);
        echo json_encode($resultado);
        break;

    default:
        // Puedes manejar un caso por defecto o simplemente no hacer nada
        break;
}

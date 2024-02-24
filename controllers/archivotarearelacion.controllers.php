<?php
error_reporting(0);

// Requerimientos
require_once('../config/config.php');
require_once("../models/archivotarearelacion.models.php"); // Cambiado el nombre del modelo
require_once("../models/archivos.models.php"); // Agregado el modelo de archivos
require_once("../models/tareas.models.php"); // Agregado el modelo de tareas

$ArchivoTareaRelacion = new ArchivoTareaRelacion; // Cambiado el nombre de la clase

switch ($_GET["op"]) {
    // Listar todas las relaciones entre archivos y tareas
    case 'todos':
        $datos = $ArchivoTareaRelacion->todas(); // Cambiado el nombre de la función
        $todos = array();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    // Obtener una relación entre archivo y tarea por su ID
    case 'uno':
        $ArchivoTareaRelacionID = $_POST["ArchivoTareaRelacionID"]; // Cambiado el nombre del parámetro
        $datos = $ArchivoTareaRelacion->uno($ArchivoTareaRelacionID); // Cambiado el nombre de la función
        echo json_encode($datos);
        break;

    // Insertar una nueva relación entre archivo y tarea
    case 'insertar':
        $ArchivoID = $_POST["ArchivoID"];
        $TareaID = $_POST["TareaID"];
        
        // Insertar la relación entre archivo y tarea
        $resultado = $ArchivoTareaRelacion->Insertar($ArchivoID, $TareaID); // Cambiado el nombre de la función
        echo json_encode($resultado);
        break;

    // Actualizar una relación entre archivo y tarea existente
    case 'actualizar':
        $ArchivoTareaRelacionID = $_POST["ArchivoTareaRelacionID"]; // Cambiado el nombre del parámetro
        $ArchivoID = $_POST["ArchivoID"];
        $TareaID = $_POST["TareaID"];
        
        // Actualizar la relación entre archivo y tarea
        $resultado = $ArchivoTareaRelacion->Actualizar($ArchivoTareaRelacionID, $ArchivoID, $TareaID); // Cambiado el nombre de la función
        echo json_encode($resultado);
        break;

    // Eliminar una relación entre archivo y tarea
    case 'eliminar':
        $ArchivoTareaRelacionID = $_POST["ArchivoTareaRelacionID"]; // Cambiado el nombre del parámetro
        $resultado = $ArchivoTareaRelacion->Eliminar($ArchivoTareaRelacionID); // Cambiado el nombre de la función
        echo json_encode($resultado);
        break;

    default:
        // Puedes manejar un caso por defecto o simplemente no hacer nada
        break;
}
?>
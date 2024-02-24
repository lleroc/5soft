<?php
require_once("../config/conexion.php");
class Comentarios{

    public function todos(){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM comentarios";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    public function todosUsuarios($UsuarioID){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM comentarios WHERE id_usuario = $UsuarioID";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    public function todosTareas($TareaID){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM comentarios WHERE id_usuario = $TareaID";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
   
    
    public function InsertarUsuarios($Contenido, $TareaID, $UsuarioID){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO comentarios ( Contenido, TareaID, UsuarioID) VALUES ('$Contenido', '$TareaID', '$UsuarioID')";
        if(mysqli_query($con, $cadena)){
            require_once("../models/usuarios.models.php");
            $usuariosModel = new Usuarios(); 
            return $usuariosModel->Insertar(mysqli_insert_id($con), $UsuarioID);
        }else{
            return "Error al insertar su comentario";
        }
        $con->close();

    }

    public function InsertarTareas($Contenido, $TareaID, $UsuarioID){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO comentarios ( Contenido, TareaID, UsuarioID) VALUES ('$Contenido', '$TareaID', '$UsuarioID');";
        if(mysqli_query($con, $cadena)){
            require_once("../models/tareas.models.php");
            $tareasModel = new Usuarios(); 
            return $tareasModel->Insertar(mysqli_insert_id($con), $TareaID);
        }else{
            return "Error al insertar su comentario";
        }
        $con->close();

    }

    public function Actualizar($ComentarioID,$Contenido, $FechaCreacion, $TareaID, $UsuarioID){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE comentarios SET Contenido = '$Contenido', FechaCreacion = '$FechaCreacion', TareaID = $TareaID, UsuarioID = $UsuarioID WHERE ComentarioID = $ComentarioID;";
        if (mysqli_query($con, $cadena)) {
            return ($ComentarioID);
        } else {
            return 'error al actualizar el registro';
        }
        $con->close();
    }

    public function Eliminar($ComentarioID){
        require_once("../models/usuarios.models.php");
        $usuariosModel = new Usuarios(); 
        $usuariosModel->eliminar($ComentarioID);
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from comentarios where ComentarioID = $ComentarioID;";

        if(mysqli_query($con,$cadena)){
            return true;

        }else{
            return false;
        }
        $con->close();

        
    }





}
function init() {
    $("#form_proyectos").on("submit", (e) => {
      GuardarEditar(e);
    });
  }
  
  $().ready(() => {
    CargaLista();
  });
  
  var CargaLista = () => {
    var html = "";
    $.get(
      "../../controllers/archivotarearelacion.controllers.php?op=todos", // Cambiado el nombre del controlador
      (ListRelaciones) => {
        ListRelaciones = JSON.parse(ListRelaciones);
        $.each(ListRelaciones, (index, relacion) => {
          html += `<tr>
            <td>${index + 1}</td>
            <td>${relacion.ArchivoID}</td>
            <td>${relacion.TareaID}</td>
            <td>
              <button class='btn btn-warning' onclick='eliminarRelacion(${
                relacion.ArchivoTareaRelacionID
              })'>Eliminar</button>
            </td>
          </tr>`;
        });
        $("#ListaRelaciones").html(html);
      }
    );
  };
  
  var GuardarEditar = (e) => {
    e.preventDefault();
    var DatosFormularioRelacion = new FormData($("#form_proyectos")[0]); // Cambiado el nombre del formulario
    var accion = "../../controllers/archivotarearelacion.controllers.php?op=insertar"; // Cambiado el nombre del controlador
  
    $.ajax({
      url: accion,
      type: "post",
      data: DatosFormularioRelacion,
      processData: false,
      contentType: false,
      cache: false,
      success: (respuesta) => {
        console.log(respuesta);
        respuesta = JSON.parse(respuesta);
        if (respuesta == "ok") {
          alert("Se guardó con éxito");
          CargaLista();
          LimpiarCajas();
        } else {
          alert("Error al guardar");
        }
      },
    });
  };
  
  var eliminarRelacion = (ArchivoTareaRelacionID) => {
    if (confirm("¿Estás seguro de que quieres eliminar esta relación?")) {
      $.post(
        "../../controllers/archivotarearelacion.controllers.php?op=eliminar", // Cambiado el nombre del controlador
        { ArchivoTareaRelacionID: ArchivoTareaRelacionID }, // Cambiado el nombre del parámetro
        (resultado) => {
          resultado = JSON.parse(resultado);
          if (resultado === "ok") {
            alert("Relación eliminada correctamente");
            CargaLista();
          } else {
            alert("Error al eliminar la relación");
          }
        }
      );
    }
  };
  
  var LimpiarCajas = () => {
    // Limpiar los campos del formulario si es necesario
    // ...
  
    // Ocultar el modal si es necesario
    // $("#ModalProyectos").modal("hide");
  };
  
  // Función para ver las tareas asociadas a un proyecto
  var verTareas = (ProyectoID) => {
    // Aquí puedes agregar la lógica para cargar las tareas asociadas al proyecto y mostrarlas en la vista
  };
  
  init();
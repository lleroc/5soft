function init() {
    $("#form_asignaciones").on("submit", (e) => {
      GuardarAsignacion(e);
    });
  }
  
  $().ready(() => {
    CargaListaAsignaciones();
  });
  
  var CargaListaAsignaciones = () => {
    var html = "";
    $.get(
      "../../controllers/asignaciones.controller.php?op=todos",
      (ListaAsignaciones) => {
        ListaAsignaciones = JSON.parse(ListaAsignaciones);
        $.each(ListaAsignaciones, (index, asignacion) => {
          html += `<tr>
              <td>${index + 1}</td>
              <td>${asignacion.Tarea}</td>
              <td>${asignacion.Usuario}</td>
              <td>
                <button class='btn btn-primary' onclick='editar(${asignacion.AsignacionID})'>Editar</button>
                <button class='btn btn-warning' onclick='eliminar(${asignacion.AsignacionID})'>Eliminar</button>
              </td>
              </tr>`;
        });
        $("#ListaAsignaciones").html(html);
      }
    );
  };
  
  var GuardarAsignacion = (e) => {
    e.preventDefault();
    var DatosFormularioAsignacion = new FormData($("#form_asignaciones")[0]);
    var accion = "../../controllers/asignaciones.controller.php?op=insertar";
  
    $.ajax({
      url: accion,
      type: "post",
      data: DatosFormularioAsignacion,
      processData: false,
      contentType: false,
      cache: false,
      success: (respuesta) => {
        console.log(respuesta);
        respuesta = JSON.parse(respuesta);
        if (respuesta == "ok") {
          alert("Asignación guardada con éxito");
          CargaListaAsignaciones();
          LimpiarCajasAsignaciones();
        } else {
          alert("Error al guardar la asignación");
        }
      },
    });
  };
  
  var editar = (AsignacionID) => {
    // Implementa la lógica para editar una asignación
  };
  
  var eliminar = (AsignacionID) => {
    // Implementa la lógica para eliminar una asignación
  };
   
  var LimpiarCajasAsignaciones = () => {
    // Implementa la lógica para limpiar los campos del formulario de asignaciones
  };
  
  init();

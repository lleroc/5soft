function init() {
  $("#form_proyectos").on("submit", (e) => {
    GuardarEditar(e);
  });
}
var ruta = "../../controllers/usuarios.controllers.php?op="; 

$().ready(() => {
  CargaLista();
});

var CargaLista = () => {
  var html = "";
  $.get(
      "../../controllers/proyectos.controllers.php?op=todos",
      (ListProyectos) => {
          ListProyectos = JSON.parse(ListProyectos);
          $.each(ListProyectos, (index, proyecto) => {
              html += `<tr>
              <td>${index + 1}</td>
              <td>${proyecto.NombreDelProyecto}</td>
              <td>${proyecto.Descripcion}</td>
              <td>${proyecto.FechaDeInicio}</td>
              <td>${proyecto.FechaDeFinalizacion}</td>
              <td>
                  <button class='btn btn-primary' onclick='editar(${
                  proyecto.ProyectoID
                  })'>Editar</button>
                  <button class='btn btn-warning' onclick='eliminar(${
                  proyecto.ProyectoID
                  })'>Eliminar</button>
                  <button class='btn btn-info' onclick='verTareas(${
                  proyecto.ProyectoID
                  })'>Ver Tareas</button>
              </td>
              </tr>`;
          });
          $("#ListaProyectos").html(html);
      }
  );
};

var GuardarEditar = (e) => {
  e.preventDefault();
  var DatosFormularioProyecto = new FormData($("#form_proyectos")[0]);
  var accion = "../../controllers/proyectos.controllers.php?op=insertar";

  $.ajax({
      url: accion,
      type: "post",
      data: DatosFormularioProyecto,
      processData: false,
      contentType: false,
      cache: false,
      success: (respuesta) => {
          console.log(respuesta);
          respuesta = JSON.parse(respuesta);
          if (respuesta == "ok") {
              alert("Se guardo con éxito");
              CargaLista();
              LimpiarCajas();
          } else {
              alert("Error al guardar");
          }
      },
  });
};

var editar = (ProyectoID) => {
  $.post(
      "../../controllers/proyectos.controllers.php?op=uno",
      { ProyectoID: ProyectoID },
      (proyecto) => {
          proyecto = JSON.parse(proyecto);
          $("#ProyectoID").val(proyecto.ProyectoID);
          $("#NombreDelProyecto").val(proyecto.NombreDelProyecto);
          $("#Descripcion").val(proyecto.Descripcion);
          $("#FechaDeInicio").val(proyecto.FechaDeInicio);
          $("#FechaDeFinalizacion").val(proyecto.FechaDeFinalizacion);
          $("#ModalProyectos").modal("show");
      }
  );
};

var eliminar = (ProyectoID) => {
  if (confirm("¿Estás seguro de que quieres eliminar este proyecto?")) {
      $.post(
          "../../controllers/proyectos.controllers.php?op=eliminar",
          { ProyectoID: ProyectoID },
          (resultado) => {
              resultado = JSON.parse(resultado);
              if (resultado === "ok") {
                  alert("Proyecto eliminado correctamente");
                  CargaLista();
              } else {
                  alert("Error al eliminar el proyecto");
              }
          }
      );
  }
};

var usuarios = () => {
  return new Promise((resolve, reject) => {
    var html = `<option value="0">Seleccione una opción</option>`;
    $.post(
      "../../controllers/usuarios.controllers.php?op=todos",
      async (ListaUsuarios) => {
        ListaUsuarios = JSON.parse(ListaUsuarios);
        $.each(ListaUsuarios, (index, usuarios) => {
          html += `<option value="${usuarios.UserID}">${usuarios.Nombre}</option>`;
        });
        await $("#Usuario").html(html);
        resolve();
      }
    ).fail((error) => {
      reject(error);
    });
  });
};

var LimpiarCajas = () => {
  document.getElementById("NombreDelProyecto").value = "";
  document.getElementById("Descripcion").value = "";
  document.getElementById("FechaDeInicio").value = "";
  document.getElementById("FechaDeFinalizacion").value = "";
  $("#ModalProyectos").modal("hide");
};

// Función para ver las tareas asociadas a un proyecto
var verTareas = (ProyectoID) => {
  // Aquí puedes agregar la lógica para cargar las tareas asociadas al proyecto y mostrarlas en la vista
};

init();
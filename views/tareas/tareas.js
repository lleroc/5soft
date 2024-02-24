function init() {
  $("#form_tareas").on("submit", (e) => {
    GuardarEditar(e);
  });
}

var ruta = "../../controllers/tarea.controllers.php?op=";
$().ready(() => {
  CargaLista();
  CargarProyectos(); // Agregado: Cargar la lista de proyectos al cargar la página
});

var CargarProyectos = () => { // Agregado: Función para cargar la lista de proyectos
  $.get("../../controllers/proyectos.controllers.php?op=todos", (ListaProyectos) => {
      ListaProyectos = JSON.parse(ListaProyectos);
      var selectProyectos = $("#Proyecto");
      selectProyectos.empty(); // Limpiar opciones anteriores
      $.each(ListaProyectos, (index, proyecto) => {
          selectProyectos.append(`<option value="${proyecto.ProyectoID}">${proyecto.NombreDelProyecto}</option>`);
      });
  });
};


var CargaLista = () => {
  var html = "";
  $.get("../../controllers/tareas.controllers.php?op=todos", (ListaTareas) => {
    ListaTareas = JSON.parse(ListaTareas);
    $.each(ListaTareas, (index, tareas) => {
      html += `<tr>
                <td>${index + 1}</td>
                <td>${tareas.Descripcion}</td>
                <td>${tareas.FechaCreacion}</td>
                <td>${tareas.FechaVencimiento}</td>
                <td>${tareas.Estado}</td>
    <td>
    <button class='btn btn-primary' click='uno(${
      tareas.TareaID
    })'>Editar</button>
    <button class='btn btn-warning' click='eliminar(${
      tareas.TareaID
    })'>Eliminar</button>
                `;
    });
    $("#ListaTareas").html(html);
  });
};

var GuardarEditar = (e) => {
  e.preventDefault();
  var DatosFormularioTareas = new FormData($("#form_tareas")[0]);
  var accion = "../../controllers/tareas.controllers.php?op=insertar";

  for (var pair of DatosFormularioTareas.entries()) {
    console.log(pair[0] + ", " + pair[1]);
  }

  $.ajax({
    url: accion,
    type: "post",
    data: DatosFormularioTareas,
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
        alert("No se Guardo");
      }
    },
  });
};
var Editar = (TareaID) => {
  $.post(
    "../../controllers/tareas.controllers.php?op=uno",
    { TareaID: TareaID },
    (tareas) => {
      tareas = JSON.parse(tareas);
      $("#ProyectoID").val(tareas.TareaID);
      $("#NombreDelProyecto").val(tareas.Descripcion);
      $("#Descripcion").val(tareas.FechaCreacion);
      $("#FechaDeInicio").val(tareas.FechaVencimiento);
      $("#FechaDeFinalizacion").val(tareas.Estado);
      $("#ModalProyectos").modal("show");
    }
  );
};

var Eliminar = (TareaID) => {
  if (confirm("¿Estás seguro de que quieres eliminar este proyecto?")) {
    $.post(
      "../../controllers/tareas.controllers.php?op=eliminar",
      { TareaID: TareaID },
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

var LimpiarCajas = () => {
  (document.getElementById("Descripcion").value = ""),
    (document.getElementById("FechaCreacion").value = ""),
    (document.getElementById("FechaVencimiento").value = ""),
    (document.getElementById("Estado").value = ""),
    $("#ModalTareas").modal("hide");
};
init();

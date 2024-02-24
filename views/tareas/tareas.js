function init() {
  $("#form_tareas").on("submit", (e) => {
    GuardarEditar(e);
  });
}

var ruta = "../../controllers/tarea.controllers.php?op=";
$().ready(() => {
  CargaLista();
});

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

/*var GuardarEditar = (e) => {
  e.preventDefault();
  var DatosFormularioTareas = new FormData($("#form_tareas")[0]);
  var accion = "";

  if (document.getElementById("TareaID").value != "") {
    accion = ruta + "actualizar";
  } else {
    accion = ruta + "insertar";
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
        Swal.fire({
          title: "Tareas!",
          text: "Se guardó con éxito",
          icon: "success",
        });
        CargaLista();
        LimpiarCajas();
      } else {
        Swal.fire({
          title: "Tareas!",
          text: "Error al guradar",
          icon: "error",
        });
      }
    },
  });*/
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
/*
var uno = async (TareaID) => {
  document.getElementById("tituloModal").innerHTML = "Actualizar Tareas";
  $.post(ruta + "uno", { TareaID: TareaID }, (tareas) => {
    usuario = JSON.parse(tareas);
    document.getElementById("idUsuarios").value = tareas.idUsuarios;
    document.getElementById("Descripcion").value = tareas.Descripcion;
    document.getElementById("FechaCreacion").value = tareas.FechaCreacion;
    document.getElementById("FechaVencimiento").value = tareas.FechaVencimiento;
    document.getElementById("Estado").value = tareas.Estado;
  });
};

var eliminar = (TareaID) => {
  Swal.fire({
    title: "Tarea",
    text: "Esta segurpo que desea eliminar la Tarea",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(ruta + "eliminar", { TareaID: TareaID }, (respuesta) => {
        respuesta = JSON.parse(respuesta);
        if (respuesta == "ok") {
          CargaLista();
          Swal.fire({
            title: "Tareas!",
            text: "Se emliminó con éxito",
            icon: "success",
          });
        } else {
          Swal.fire({
            title: "Tareas!",
            text: "Error al guradar",
            icon: "error",
          });
        }
      });
    }
  });
};
*/
var LimpiarCajas = () => {
  (document.getElementById("Descripcion").value = ""),
    (document.getElementById("FechaCreacion").value = ""),
    (document.getElementById("FechaVencimiento").value = ""),
    (document.getElementById("Estado").value = ""),
    $("#ModalTareas").modal("hide");
};
init();

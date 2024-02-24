function init() {
  $("#form_tareas").on("submit", (e) => {
    GuardarEditar(e);
  });
}

$().ready(() => {
  alert("hola");
  CargaLista();
});

var CargaLista = () => {
  var html = "";
  $.get("../../controllers/tareas.controller.php?op=todos", (ListaTareas) => {
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
  var accion = "../../controllers/tareas.controller.php?op=insertar";

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

var uno = () => {};

var eliminar = () => {};

var LimpiarCajas = () => {
  (document.getElementById("Descripcion").value = ""),
    (document.getElementById("FechaCreacion").value = ""),
    (document.getElementById("FechaVencimiento").value = ""),
    (document.getElementById("Estado").value = ""),
    $("#ModalTareas").modal("hide");
};
init();

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
      "../../controllers/proyectos.php?op=todos",
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
    var accion = "../../controllers/proyectos.php?op=insertar";
  
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
      "../../controllers/proyectos.php?op=uno",
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
        "../../controllers/proyectos.php?op=eliminar",
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
   
  var LimpiarCajas = () => {
    document.getElementById("NombreDelProyecto").value = "";
    document.getElementById("Descripcion").value = "";
    document.getElementById("FechaDeInicio").value = "";
    document.getElementById("FechaDeFinalizacion").value = "";
    $("#ModalProyectos").modal("hide");
  };
  
  init();
  
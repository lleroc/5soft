<?php require_once('../html/head2.php')  ?>

<!-- Basic Bootstrap Table -->
<div class="card">
    <button type="button" class="btn btn-outline-secondary" onclick="usuarios()" data-bs-toggle="modal" data-bs-target="#ModalProyectos">Nuevo Proyecto</button>

    <h5 class="card-header">Lista de Proyectos</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Finalización</th>
                    <th>Acciones</th>
                    <th>Usuario/s</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="ListaProyectos">

            </tbody>
        </table>
    </div>
</div>


<!-- Modal Proyectos -->

<div class="modal" tabindex="-1" id="ModalProyectos">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_proyectos" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="NombreDelProyecto">Nombre del Proyecto</label>
                        <input type="text" name="NombreDelProyecto" id="NombreDelProyecto" class="form-control" placeholder="Ingrese el nombre del proyecto" required>
                    </div>
                    <div class="form-group">
                        <label for="NombreDelProyecto">Descripción</label>
                        <textarea name="Descripcion" id="Descripcion" class="form-control" placeholder="Ingrese la descripción del proyecto" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="NombreDelProyecto">Fecha de Inicio</label>
                        <input type="date" name="FechaDeInicio" id="FechaDeInicio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="NombreDelProyecto">Fecha de Finalización</label>
                        <input type="date" name="FechaDeFinalizacion" id="FechaDeFinalizacion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="NombreDelProyecto">Usuario/s</label>
                        <input  name="Usuario" id="Usuario" class="form-control" required>
                    </div>
                    <!-- Agregado: Campo para seleccionar las tareas asociadas al proyecto -->
                    <div class="form-group">
                        <label for="TareasAsociadas">Tareas Asociadas</label>
                        <select name="TareasAsociadas" id="TareasAsociadas" class="form-control" multiple>
                            <!-- Aquí se cargarán dinámicamente las opciones de las tareas -->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/scripts2.php') ?>

<script src="./proyecto.js"></script>

<?php require_once('../html/head2.php')  ?>

<!-- Basic Bootstrap Table -->
<div class="card">
    <button type="button" class="btn btn-outline-secondary" onclick="tareas();" data-bs-toggle="modal" data-bs-target="#ModalTareas">Nueva Tarea</button>


    <h5 class="card-header">Lista de Tareas</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Descripcion</th>
                    <th>FechaCreacion</th>
                    <th>FechaVencimiento</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="ListaTareas">

            </tbody>
        </table>
    </div>
</div>


<!-- Modal Sucursales-->

<div class="modal" tabindex="-1" id="ModalTareas">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="form_tareas" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Nombres">Descripción</label>
                        <input type="text" name="Descripcion" id="Descripcion" class="form-control" placeholder="Ingrese una Descripción" required>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Fecha de Creación</label>
                        <input type="date" name="FechaCreacion" id="FechaCreacion" class="form-control" placeholder="Ingrese una fecha de inicio" required>
                    </div>
                    <div class="form-group">
                        <label for="Nombres">Fecha de Vencimiento</label>
                        <input type="date" name="FechaVencimiento" id="FechaVencimiento" class="form-control" placeholder="Ingrese una fecha aproximada de termino" required>
                    </div>                    
                    <div class="form-group">
                        <label for="Nombres" class="form-label">Estado</label>
                        <select name="tipo" id="tipo" class="form-control"></select>
                    </div>
                    <div class="form-group">
                      <label for="Proyecto">Proyecto</label>
                      <select name="Proyecto" id="Proyecto" class="form-control" required>
        <!-- Las opciones se cargarán dinámicamente mediante JavaScript -->
                     </select>
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

<script src="./tareas.js"></script>
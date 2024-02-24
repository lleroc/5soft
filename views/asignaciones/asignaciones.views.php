<?php require_once('../html/head2.php')  ?>

<!-- Basic Bootstrap Table -->
<div class="card">
    <button type="button" class="btn btn-outline-secondary" onclick="asignaciones();" data-bs-toggle="modal" data-bs-target="#ModalAsignaciones">Nueva Asignación</button>


    <h5 class="card-header">Lista de Asignaciones</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tarea</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="ListaAsignaciones">

            </tbody>
        </table>
    </div>
</div>


<!-- Modal Asignaciones-->

<div class="modal" tabindex="-1" id="ModalAsignaciones">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="form_asignaciones" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="TareaID">Tarea</label>
                        <select name="TareaID" id="TareaID" class="form-control" required>
                        <div class="form-group">
                            <label for="TareaID">Tarea</label>
                        <select name="TareaID" id="TareaID" class="form-control" required>
        
                         </select>
                        </div>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="UsuarioID">Usuario</label>
                        <select name="UsuarioID" id="UsuarioID" class="form-control" required>
                           
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

<script src="./asignaciones.js"></script>
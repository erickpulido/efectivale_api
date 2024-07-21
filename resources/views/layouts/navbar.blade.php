<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Efectivale</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/requests">Solicitudes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/users">Usuarios</a>
                </li>
            </ul>
            <div class="d-flex">
                <form action="/logout">
                    <button type="button" class="btn btn-outline-success btn-user-edit" value="{{auth()->user()->id}}" data-bs-toggle="modal" data-bs-target="#user-data-modal">Mis datos</button>
                    &nbsp;
                    <button type="submit" id="btn-logout" class="btn btn-danger" type="submit">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </div>
</nav>


<!-- Modal -->
<div class="modal fade" id="user-data-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar información</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form id="form-user-edit">
                    <div class="modal-body">
                        <!-- Name input -->
                        <label class="form-label">Nombre</label>
                        <div class="input-group has-validation mb-4">
                            <input type="name" name="name" class="form-control" required>
                            <div id="name-invalid" class="invalid-feedback">

                            </div>
                        </div>

                        <!-- Email input -->
                        <label class="form-label">Email</label>
                        <div class="input-group has-validation mb-4">
                            <input type="email" name="email" class="form-control" required>
                            <div id="email-invalid" class="invalid-feedback">

                            </div>
                        </div>

                        <!-- Password input -->
                        <label class="form-label">Password</label>
                        <div class="input-group has-validation mb-4">
                            <input type="password" name="password" class="form-control" required>
                            <div id="password-invalid" class="invalid-feedback">

                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary btn-user-update" value="{{auth()->user()->id}}">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
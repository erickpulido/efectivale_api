@extends('layouts.app-dev')

@section('content')
<div class="container">
    <section class="col-6 offset-3 pb-4">
        <div class="border rounded-5">
            <section class="w-100 p-4 d-flex justify-content-center pb-4">
                <div class="col-9">

                    <!-- Pills navs -->
                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="tab-login" data-bs-toggle="tab" data-bs-target="#pills-login">Iniciar sesión</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab-register" data-bs-toggle="tab" data-bs-target="#pills-register">Registrarse</a>
                        </li>
                    </ul>
                    <!-- Pills navs -->

                    <!-- Pills content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                            <div class="alert alert-danger d-none mb-4 response-message" role="alert">
                                {message}
                            </div>
                            <form id="login">

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

                                <!-- Submit button -->
                                <button type="button" id="btn-login" class="btn btn-primary btn-block mb-4">Iniciar sesión</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                            <div class="alert alert-danger d-none mb-4 response-message" role="alert">
                                {message}
                            </div>
                            <form id="register">
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

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role" value="1">
                                    <label class="form-check-label">
                                        Administrador
                                    </label>
                                </div>
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="radio" name="role" value="2" checked>
                                    <label class="form-check-label">
                                        Usuario Estándar
                                    </label>
                                </div>

                                <!-- Submit button -->
                                <button type="button" id="btn-register" class="btn btn-primary btn-block mb-3">Registrarse</button>
                            </form>
                        </div>
                    </div>
                    <!-- Pills content -->
                </div>
            </section>
        </div>
    </section>
</div>
@stop
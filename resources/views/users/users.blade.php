@extends('layouts.app-dev')
@extends('layouts.navbar')

@section('content')
<div class="container">
<div class="row mt-4">
        <h2>Usuarios</h2>
    </div>
    <div class="row mt-4">
        <p>
            En esta interfaz se administran los usuarios.
        </p>
    </div>
    <div class="row mt-4">
        <table id="users-table" class="table table-responsive table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Estatus</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
            
        </table>
    </div>
</div>
@stop
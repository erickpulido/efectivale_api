@extends('layouts.app-dev')
@extends('layouts.navbar')

@section('content')
<div class="container">
    <div class="row mt-4">
        <h2>Solicitudes</h2>
    </div>
    <div class="row mt-4">
        <p>
            En esta interfaz se administran las solicitudes de los prospectos y se indica si ya se realizó la llamada
        </p>
    </div>
    <div class="row mt-4">
        <table id="requests-table" class="table table-responsive table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Llamada</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
            
        </table>
    </div>
</div>
@stop
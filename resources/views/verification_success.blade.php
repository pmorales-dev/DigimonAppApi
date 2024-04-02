@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Correo Verificado</div>

                    <div class="card-body">
                        <p>Tu correo fue validado satisfactoriamente.</p>
                        <p>Nombre: {{ $user->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('backend.layouts.main')
@section('title', 'Noticias')
@section('menu')
@parent
<li class="nav-item"><a href="#" class="nav-link">Nuevo</a></li>
<li class="nav-item"><a href="#" class="nav-link">Editar</a></li>
<li class="nav-item"><a href="#" class="nav-link">Eliminar</a></li>
@endsection
@section('content')
<div class="card mb-3">
    <div class="row no-gutters">
        <div class="col-md-7">
            <div class="card-body">
                <h5 class="card-title">{{ $categoria->name}}</h5>
                <p class="card-text">{!! $categoria->description !!}</p>
            </div>
        </div>
    </div>
</div>
@endsection
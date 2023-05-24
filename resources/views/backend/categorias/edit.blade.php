@extends('backend.layouts.main')

@section('title', 'Editar Categoria')

@section('content')
    <h1>Editar Categoria</h1>
    <div>
        @if (Session::has('status'))
            <div class="alert alert-success">{{ Session('status') }}</div>
        @endif
    </div>
    <div class="links">
        {{ Form::model($categoria, ['method' => 'put', 'route' => ['categorias.update', $categoria->id]]) }}
        @csrf
        <div class="form-group @if ($errors->has('titulo')) has-error has-feedback @endif">
            {{ Form::label('name', 'Título', ['class' => 'control-label']) }}
            {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Ingrese el Título']) }}
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('description', 'Cuerpo', ['class' => 'control-label']) }}
            {{ Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => 'Ingrese la Descripcion']) }}
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

    </div>
    </br><button type="submit" style="width: 100%;" class="btn btn-primary">Guardar</button>
    </div>
    {!! Form::close() !!}
@endsection

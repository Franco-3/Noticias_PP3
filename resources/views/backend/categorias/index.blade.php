@extends('backend.layouts.main')
@section('title', __('categorias.index'))
@section('content')
@forelse($categorias as $categoria)

  
    <div class="col">
    <div class="card">
            <div class="card-body">
            <div class="col">
                <h4 class="card-title text-info">{{ $categoria->name }}</h4>
            </div>
            <div class="col">
                <p class="card-text">{!! Str::limit($categoria->description, 50) !!}</p>
            </div>
                    <div class="col">
                        <div class="text-end">
                            {{ Form::model($categoria, ['method' => 'delete', 'route' => ['categorias.destroy', $categoria->id]]) }}
                            @csrf
                            <a href="{{ route('categorias.show', ['categoria' => $categoria->id]) }}" class="btn btn-info"><img src="{{ asset('svg/show.svg') }}" width="20" height="20" alt="Mostrar" title="Mostrar"></a>
                            <a href="{{ route('categorias.edit', ['categoria' => $categoria->id]) }}" class="btn btn-primary"><img src="{{ asset('svg/edit.svg') }}" width="20" height="20" alt="Editar" title="Editar"></a>
                            <button type="submit" class="btn btn-danger" onclick="if (!confirm('Está seguro de borrar la categoria?')) return false;"><img src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar" title="Borrar"></button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                
            </div>
        </div>
    </div>

@empty
<p class="text-capitalize"> No hay categorias </p>
@endforelse
</div>
<hr>
<!-- Paginación -->
<div class="d-flex justify-content-center">
    <!-- 
  Agregar en App\Providers\AppServiceProvider:
  use Illuminate\Pagination\Paginator;
      public function boot() { Paginator::useBootstrap(); } -->
    
    
</div>
@endsection
    
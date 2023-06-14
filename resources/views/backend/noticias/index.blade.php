@extends('backend.layouts.main')
@section('title', __('noticias.index'))
@section('content')

@section('menu')
    @parent
    
    <ul class="navbar-nav ms-auto me-5">
                <li>
                    <div class="nav-item text-light d-flex">
                        {{ Form::select('categoria', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una categoria']) }}
                    </div>
                </li>
            </ul>
@endsection

@forelse($noticias as $noticia)
@if ($loop->first)
<div class="row mt-3">
    @endif
    <div class="col-md-4">
    <div class="card">
            @if ($noticia->imagen)
            @if (Str::startsWith($noticia->imagen, 'http'))
            <img src="{{ $noticia->imagen }}" class="card-img-top" alt="...">
            @else
            <img src="{{ asset('/storage/' . $noticia->imagen) }}" class="card-img-top" alt="...">
            @endif
            @else
            <img src="../img/no_image.png" alt="no image" class="card-img-top">
            <hr>
            @endif
            <div class="card-body bg-secondary text-dark bg-gradient bg-opacity-50">
                <h3 class="card-title fw-bold text-dark">{{ $noticia->titulo }}</h3>
                <p class="card-text text-end">{{ $noticia->creadaPor->name }}</p>
                <p class="card-text">{!! Str::limit($noticia->cuerpo) !!}</p>
                <div class="card-text text-start">
                    <small>{{ $noticia->created_at->format('d-m-Y') }}</small>
                </div>
                <div class="card-text text-end">
                    <small>{{ $noticia->enCategoria->name }}</small>
                </div>
                {{-- Esto es un comentario en Blade --}}
                <div class="card-footer">
                    <div class="row">
                        <div class="text-end">
                            {{ Form::model($noticia, ['method' => 'delete', 'route' => ['noticias.destroy', $noticia->id]]) }}
                            @csrf
                            <a href="{{ route('noticias.show', ['noticia' => $noticia->id]) }}" class="btn btn-info"><img src="{{ asset('svg/show.svg') }}" width="20" height="20" alt="Mostrar" title="Mostrar"></a>
                            <a href="{{ route('noticias.edit', ['noticia' => $noticia->id]) }}" class="btn btn-primary"><img src="{{ asset('svg/edit.svg') }}" width="20" height="20" alt="Editar" title="Editar"></a>
                            <button type="submit" class="btn btn-danger" onclick="if (!confirm('Está seguro de borrar la noticia?')) return false;"><img src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar" title="Borrar"></button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@if ($loop->iteration % 3 == 0)
</div>
<hr>
<div class="row">
@endif
@empty
<p class="text-capitalize"> No hay noticias </p>
@endforelse
</div>
<hr>
<!-- Paginación -->
<div class="d-flex justify-content-center">
    <!-- 
  Agregar en App\Providers\AppServiceProvider:
  use Illuminate\Pagination\Paginator;
      public function boot() { Paginator::useBootstrap(); } -->
    {!! $noticias->links() !!}
</div>

@endsection
    
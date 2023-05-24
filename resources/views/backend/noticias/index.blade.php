@extends('backend.layouts.main')
@section('title', __('noticias.index'))
@section('content')
@forelse($noticias as $noticia)
@if($loop->iteration % 2 != 0)<div class="row">@endif
    <div class="col-md-6">
    <div class="card">
            @if ($noticia->imagen)
            @if (Str::startsWith($noticia->imagen, 'http'))
            <img src="{{ $noticia->imagen }}" class="card-img-top" alt="...">
            @else
            <img src="{{ asset('/storage/' . $noticia->imagen) }}" class="card-img-top" alt="...">
            @endif
            @else
            <img src="../img/no_image.png" alt="no image">
            <hr>
            @endif
            <div class="card-body">
                <h3 class="card-title text-info">{{ $noticia->titulo }}</h3>
                <p class="card-text text-end">{{ $noticia->creadaPor->name }}</p>
                <p class="card-text">{!! Str::limit($noticia->cuerpo) !!}</p>
                <p class="card-text text-start">
                    <small>{{ $noticia->created_at->format('d-m-Y') }}</small>
                </p>
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
@if($loop->iteration % 2 == 0)
</div><hr>
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
    
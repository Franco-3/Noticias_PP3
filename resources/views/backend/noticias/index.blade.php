@extends('backend.layouts.main')
@section('title', __('noticias.index'))
@section('content')
@forelse($noticias as $noticia)
@if($loop->iteration % 2 != 0)<div class="row">@endif
    <div class="col-md-6">
        <div class="card">
            @if($noticia->imagen)
            @if(Str::startsWith($noticia->imagen, 'http'))
            <img src="{{$noticia->imagen}}" alt="" class="card-img-top">
            @endif
            @else
            <img src="..img/no_image.png" alt="no image"><hr>
            @endif
            <div class="card-body">
                <h3 class="card-title text-info">{{$noticia->titulo}}</h3>
                <p class="card-text text-left">{{$noticia->autor}}</p>
                <p class="card-text">{!! $noticia->cuerpo !!}</p>
                <div class="card-footer">
                    <div class="row">
                        <a href="{{ route('noticias.show', ['noticia' => $noticia->id]) }}" class="btn btn-info btn-sm">
                            <img src="{{ asset('eye.svg') }}" width="20" height="20">
                            <!--<img src="{{ asset('\laragon\www\app\storage\svg') }}" width="20" height="20"> -->
                        </a>
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
</div><hr>
@endsection
    
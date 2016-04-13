@extends('layouts.frontend')

@section('content')
    <div class="container">
        <h3>Catalogo <small>Clicca sull'immagine per ingrandirla.</small></h3>
        <br>
        <div class="row">
            @foreach($images as $image)
                <div class="col-md-4 text-center thumbnail">
                    <p><strong>{{ $image->image_title }}</strong></p>
                    <a href="{{ route('show',$image->id) }}">
                        <img src="{{ $image->image_thumbnail_path.$image->image_thumbnail }}">
                    </a>
                    {!! nl2br($image->image_description) !!}
                </div>
            @endforeach
        </div>
        {!! $images->appends(Request::all())->render() !!}
    </div>

@endsection




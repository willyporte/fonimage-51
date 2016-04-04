@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Elenco Immagini</div>
                    <div class="panel-body">

                        @include('errors.errors')
                        @include('messages.success')

                        @foreach($images as $image)

                            <strong>{{ $image->image_title }}</strong>
                            <div>
                                <a href="{{ route('catalogo.show',$image->id) }}">
                                    <img src="{{ $image->image_thumbnail_path.$image->image_thumbnail }}" style="border: solid 1px #CCC">
                                </a>
                            </div>
                            <p>{{ $image->image_description }}</p>

                        @endforeach
                        <p>{!! $images->render() !!}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
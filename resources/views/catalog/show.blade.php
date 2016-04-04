@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Mostra Immagine ID: {{ $image->id }}</div>
                    <div class="panel-body">
                        @include('errors.errors')
                        @include('messages.success')

                        <h2>{{ $image->image_title }}</h2>
                        <div align="center">
                            <img src="{{ $image->image_path.$image->image_name }}" style="border: solid 1px #CCC">
                        </div>
                        <p>{{ $image->image_description }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
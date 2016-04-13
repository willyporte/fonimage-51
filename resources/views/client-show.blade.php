@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">

                        @include('errors.errors')
                        @include('messages.success')
                        <div class="text-center">
                            <strong>{{ $image->image_title }}</strong>
                        </div>
                        <div align="center">
                            <img class="img-responsive" src="{{ $image->image_path.$image->image_name }}" style="border: solid 1px #CCC">
                        </div>
                        <p class="text-center">
                            {!! nl2br($image->image_description) !!}
                        </p>

                    </div>
                </div>
            </div>
        </div>
@endsection
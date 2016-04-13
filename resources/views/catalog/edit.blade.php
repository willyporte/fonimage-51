@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Modifica Item</div>
                    <div class="panel-body">

                        @include('errors.errors')
                        @include('messages.success')

                        {!! Form::model($image,['route' => ['catalogo.update', $image->id], 'method' => 'PUT']) !!}

                        <img src="{{ $image->image_thumbnail_path.$image->image_thumbnail }}">
                        <br><br>
                        <div class="form-group">
                            {!! Form::label('image_title','Titolo Immagine') !!}
                            {!! Form::text('image_title', null, ['class' => 'form-control', 'placeholder' => 'Facoltativo']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::radio('is_active', '1', true) !!} <strong>Visibile</strong>
                            {!! Form::radio('is_active', '0') !!} <strong>Nascosta</strong>
                        </div>

                        <div class="form-group">
                            {!! Form::label('image_description','Descrizione') !!}
                            {!! Form::textarea('image_description', null,['required', 'size' => '3x5', 'placeholder' => 'Obbligatorio', 'class' => 'form-control']) !!}
                        </div>


                        <div class="form-group">
                            {!!  Form::submit('Modifica Item', ['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}

                        {!! Form::open(['route' => ['catalogo.destroy', $image->id], 'method' => 'DELETE']) !!}
                            <button type="submit" onclick="return confirm('Sicuro che vuoi cancellare l\'Item?')" class="btn btn-danger pull-right">Delete</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
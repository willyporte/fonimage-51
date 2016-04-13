@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Carica Immagine</div>
                    <div class="panel-body">

                        @include('errors.errors')
                        @include('messages.success')

                        {!! Form::open(['route' => 'catalogo.store', 'method' => 'POST', 'files' => true]) !!}

                        <div class="form-group">
                            {!! Form::label('image_file','Seleziona Immagine') !!}
                            {!! Form::file('image_file', null, ['required', 'class' => 'form-control']) !!}
                        </div>

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
                            {!!  Form::submit('Carica Image', ['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
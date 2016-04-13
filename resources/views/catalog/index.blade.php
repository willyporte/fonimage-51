@extends('layouts.master')

@section('content')
    <div class="container">
        @include('errors.errors')
        @include('messages.success')
        <h3>Catalogo <small>Clicca sull'immagine per ingrandirla.</small></h3>
        <br>
        <div class="row">

            @foreach($images as $image)
                <div class="col-md-4 text-center thumbnail">
                    <p><strong>{{ $image->image_title }}</strong></p>
                    <a href="{{ route('catalogo.show',$image->id) }}">
                        <img src="{{ $image->image_thumbnail_path.$image->image_thumbnail }}">
                    </a>
                    {{-- solo funciona con chars --}}
                    <?php $a = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 4) ?>
                    {!! nl2br($image->image_description) !!}
                    <a href="{{ route('catalogo.edit', $image->id) }}" title="Modifica Item">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <p>
                    <input id="{{ $a }}" class="input-sm" size="39" style="border:0;background-color:yellow" value="{{Request::root().$image->image_path.$image->image_name }}" readonly>
                    <a class="btn" id="copy-button" data-clipboard-target="#{{ $a }}" title="Copy to Clipboard">
                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                    </a>
                    </p>
                </div>
            @endforeach

        </div>
        {!! $images->appends(Request::all())->render() !!}
    </div>

    <i class="fa fa-paperclip" aria-hidden="true"></i>


@endsection

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.4.0/clipboard.min.js"></script>
    <script>
        var clipboard = new Clipboard('.btn');
    </script>
@endsection



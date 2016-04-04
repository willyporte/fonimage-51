@if($errors->any())
    <div class="alert alert-danger">
        <p>Correggi i seguenti errori:</p>
        <ul>
            {!! implode('',$errors->all('<li>:message</li>')) !!}
        </ul>
    </div>
@endif
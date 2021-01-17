@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Fotos dos destinos
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('destiny_photos.show_fields')
                    {!! Form::open(['route' => ['destinyPhotos.destroy', $destinyPhoto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>                        
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>                    
                    {!! Form::close() !!}
                    
                    <a href="{{ route('destinyPhotos.index') }}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection

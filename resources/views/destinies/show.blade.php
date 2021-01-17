@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Destinos
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('destinies.show_fields')
                    {!! Form::open(['route' => ['destinies.destroy', $destiny->id], 'method' => 'delete']) !!}
                    <div class='btn-group' style="margin-bottom:10px">                        
                        <a href="{{ route('destinies.edit', [$destiny->id]) }}" class='btn btn-default btn-xs'><i  style="font-size:20px;" class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i style="font-size:20px;" class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Deseja realmente excluir?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                    <a href="{{ route('destinies.index') }}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header">
                <h4>
                    Fotos
                </h4>
            </div>
            <div class="box-body">
            @forelse($destiny->photos as $photo)
            <a href="{{ route('destinyPhotos.show', [$photo->id]) }}">
                <img src="{{ $photo->image }}" alt="..." class="img-thumbnail img-responsive" width="200">
            </a>
            @empty
            <span class="text-danger">Esse destino não tem fotos adicionada!</span>
            @endforelse
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'destinyPhotos.store', 'files' => true]) !!}

                        @include('destiny_photos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
@endsection

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Banners
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('banners.show_fields')
                    {!! Form::open(['route' => ['banners.destroy', $banner->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        
                        <a href="{{ route('banners.edit', [$banner->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que deseja excluir?')"]) !!}
                    </div>
                    {!! Form::close() !!}

                    <a href="{{ route('banners.index') }}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection

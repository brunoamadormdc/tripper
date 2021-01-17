@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Home Banners 1
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('first_home_banners.show_fields')

                    {!! Form::open(['route' => ['firstHomeBanners.destroy', $firstHomeBanner->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>                        
                        <a href="{{ route('firstHomeBanners.edit', [$firstHomeBanner->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que deseja excluir?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                    <a href="{{ route('firstHomeBanners.index') }}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection

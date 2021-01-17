@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Comentário da Publicação
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('post_comments.show_fields')
                    <a href="{{ route('postComments.index') }}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection

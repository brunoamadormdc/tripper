<div class="table-responsive">
    <table class="table" id="firstHomeBanners-table">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Descrição</th>
                <th>Publicado</th>
                <th>Tags</th>
                <th colspan="3">Acao</th>
            </tr>
        </thead>
        <tbody>
        @foreach($firstHomeBanners as $firstHomeBanner)
            <tr>
                <td><img src="{{ $firstHomeBanner->image }}" class="img-responsive" width="40"></td>
                <td>{{ $firstHomeBanner->body }}</td>
                <td>
                @if($firstHomeBanner->published)
                    <span class="fa fa-check text-success"></span>
                @else
                    <span class="fa fa-close text-danger"></span>
                @endif
                </td>
                <td>
                    @forelse($firstHomeBanner->tags->sortBy('name') as $tags)
                        <a href="?tag={{ $tags->name }}" class="btn btn-primary btn-sm">{{ $tags->name }}</a>
                    @empty
                        <span class="text-danger">Sem tag</span>
                    @endforelse
                </td>
                <td>
                    {!! Form::open(['route' => ['firstHomeBanners.destroy', $firstHomeBanner->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('firstHomeBanners.show', [$firstHomeBanner->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('firstHomeBanners.edit', [$firstHomeBanner->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que deseja excluir?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $firstHomeBanners->links() }}
</div>

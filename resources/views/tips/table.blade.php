<div class="table-responsive">
    <table class="table" id="tips-table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Foto</th>
                <th>Tags</th>
                <th colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tips as $tip)
            <tr>
                <td style="width:10%">{{ $tip->title }}</td>
                <td style="width:40%">{{ Illuminate\Support\Str::limit($tip->body,150) }}</td>
                <td style="width:7%"><img src="{{ $tip->image }}" class="img-thumbnail" style="width:70px;height:70px;"></td>
                <td style="width:40%">
                    @forelse($tip->tags->sortBy('name') as $tags)
                        <a href="?tag={{ $tags->name }}" class="btn btn-primary btn-sm">{{ $tags->name }}</a>
                    @empty
                        <span class="text-danger">Sem tag</span>
                    @endforelse
                </td>
                <td style="width:3%">
                    {!! Form::open(['route' => ['tips.destroy', $tip->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tips.show', [$tip->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('tips.edit', [$tip->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que deseja excluir?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $tips->links() }}
</div>

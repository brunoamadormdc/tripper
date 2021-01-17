<div class="table-responsive">
    <table class="table" id="destinies-table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Foto 1</th>
                <th>Foto 2</th>
                <th>Publicado</th>
                <th>Tags</th>
                <th colspan="3">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($destinies as $destiny)
            <tr>
                <td>{{ $destiny->title }}</td>
                <td style="width:40%">{{ Illuminate\Support\Str::limit($destiny->body,300) }}</td>
                <td style="width:110px"><img src="{{ $destiny->main_image }}" class="img-thumbnail" style="width:100px;height:100px;"></td>            
                <td style="width:110px"><img src="{{ $destiny->secondary_image }}" class="img-thumbnail" style="width:100px;height:100px;"></td>  
                <td>
                @if($destiny->published)
                    <span class="fa fa-check text-success"></span>
                @else
                    <span class="fa fa-close text-danger"></span>
                @endif  
                </td>
                <td>
                    @forelse($destiny->tags->sortBy('name') as $tags)
                        <a href="?tag={{ $tags->name }}" class="btn btn-primary btn-sm">{{ $tags->name }}</a>
                    @empty
                        <span class="text-danger">Sem tag</span>
                    @endforelse
                </td>
                <td>
                    {!! Form::open(['route' => ['destinies.destroy', $destiny->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('destinies.show', [$destiny->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('destinies.edit', [$destiny->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que deseja excluir?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $destinies->links() }}
</div>

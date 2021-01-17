<div class="table-responsive">
    <table class="table" id="testes-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
                <th>Tags</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($testes as $teste)
            <tr>
                <td>{{ $teste->title }}</td>
                <td>{{ $teste->body }}</td>                
                <td>
                @forelse($teste->tags as $tags)
                    <a href="?tag={{ $tags->name }}" class="btn btn-primary btn-sm">{{ $tags->name }}</a>
                @empty
                    <span class="text-danger">Sem tag</span>
                @endforelse
                </td>
                <td>
                    {!! Form::open(['route' => ['testes.destroy', $teste->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('testes.show', [$teste->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('testes.edit', [$teste->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

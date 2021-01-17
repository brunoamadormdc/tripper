<div class="table-responsive">
    <table class="table" id="postComments-table">
        <thead>
            <tr>
                <th>Publicação</th>
                <th>Comentário</th>
                <th>Usuário</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Página Web</th>                
                <th>Publicado</th>
                <th colspan="3">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($postComments as $postComment)
            <tr>
                <td><a href="{{ route('posts.show', [$postComment->post->id]) }}">{{ $postComment->post->title }}</a></td>
                <td>{{ $postComment->body }}</td>
                <td>{{ $postComment->owner->name ?? 'Anônimo'}}</td>
                <td>{{ $postComment->owner->name ?? $postComment->name ?? 'Anônimo'}}</td>
                <td>{{ $postComment->owner->email ?? $postComment->email ?? '---' }}</td>
                <td>{{ $postComment->webpage ?? '---'}}</td>                
                <td>
                    @if($postComment->published == 1)
                        <span class="fa fa-check"></span>
                    @else
                    <span class="fa fa-times"></span>
                    @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['postComments.destroy', $postComment->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('postComments.show', [$postComment->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('postComments.edit', [$postComment->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
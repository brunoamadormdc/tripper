<div class="table-responsive">
    <table class="table" id="postDetails-table">
        <thead>
            <tr>
                <th>Texto</th>
                <th>Publicação</th>
                <th>Publicado</th>
                <th>Publicado por</th>
                <th>Atualizado por</th>
                <th colspan="3">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($postDetails as $postDetail)
            <tr>
                <td>{{ $postDetail->body }}</td>
            <td><a href="{{ route('posts.show', [$postDetail->post->id]) }}">{{ $postDetail->post->title }}</a></td>
            <td>
                @if($postDetail->published == 1)
                    <span class="fa fa-check"></span>
                @else
                    <span class="fa fa-times"></span>
                @endif
            </td>
            <td>{{ $postDetail->owner->name }}</td>
            <td>{{ $postDetail->updater->name ?? '---' }}</td>
                <td>
                    {!! Form::open(['route' => ['postDetails.destroy', $postDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('postDetails.show', [$postDetail->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('postDetails.edit', [$postDetail->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

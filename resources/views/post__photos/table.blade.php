<div class="table-responsive">
    <table class="table" id="postPhotos-table">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Publicacao</th>
                <th>Publicado</th>
                <th>Publicado por</th>
                <th>Alterado por</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($postPhotos as $postPhoto)
            <tr>
                <td><img src="{{ $postPhoto->image }}" width="100" class="img-responsive"></td>
            <td><a href="{{ route('posts.show', [$postPhoto->post->id]) }}">{{ $postPhoto->post->title }}</a></td>
            <td>
                @if($postPhoto->published  == 1)
                    <span class="fa fa-check"></span>
                @else
                    <span class="fa fa-times"></span>
                @endif
            </td>
            <td>{{ $postPhoto->owner->name }}</td>
            <td>{{ $postPhoto->updater->name ?? '' }}</td>
                <td>
                    {!! Form::open(['route' => ['postPhotos.destroy', $postPhoto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('postPhotos.show', [$postPhoto->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('postPhotos.edit', [$postPhoto->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <span class="pull-right">
           {{ $postPhotos->render() }}
        </span>
</div>

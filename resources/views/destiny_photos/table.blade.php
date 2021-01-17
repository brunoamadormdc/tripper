
<div class="table-responsive">
    <table class="table" id="destinyPhotos-table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Destino</th>
                <th colspan="3">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($destinyPhotos as $destinyPhoto)
            <tr>
                <td><img src="{{ $destinyPhoto->image }}" class="img-thumbnail" style="width:70px;height:70px;"></td>
                <td><a href="{{route('destinies.show', $destinyPhoto->destiny->id )}}">{{ $destinyPhoto->destiny->title }}</a></td>
                <td>
                    {!! Form::open(['route' => ['destinyPhotos.destroy', $destinyPhoto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('destinyPhotos.show', [$destinyPhoto->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <!-- <a href="{{ route('destinyPhotos.edit', [$destinyPhoto->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> -->
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que deseja excluir?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $destinyPhotos->links() }}
</div>

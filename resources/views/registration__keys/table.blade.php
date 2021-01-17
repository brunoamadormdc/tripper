<div class="table-responsive">
    <table class="table" id="registrationKeys-table">
        <thead>
            <tr>
                <th>Chave</th>
                <th>Ativa</th>
                <th colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($registrationKeys as $registrationKey)
            <tr>
                <td><input type="text" id="copiar{{$loop->iteration}}" value="{{ $registrationKey->key }}"> <button class="btn-sm btn-success fa fa-copy" onclick="copy(copiar{{$loop->iteration}})"> Copiar</button></td>
                <td>
                @if($registrationKey->status)
                    <span class="fa fa-check text-success"></span>
                @else
                    <span class="fa fa-close text-danger"></span>
                @endif</p>
                </td>
                <td>
                    {!! Form::open(['route' => ['registrationKeys.destroy', $registrationKey->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('registrationKeys.show', [$registrationKey->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('registrationKeys.edit', [$registrationKey->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $registrationKeys->links() }}

    <script>      
        function copy(elementId) {
            console.log(elementId.id);
            var copyText = document.getElementById(elementId.id);
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            alert("Copied the text: " + copyText.value);
        }        
    </script>
</div>

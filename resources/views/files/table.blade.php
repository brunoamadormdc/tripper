<div class="table-responsive">
    <table class="table" id="posts-table">
        <thead>
            <tr>
                <th>Nome</th>
                <!-- <th>Sub-titulo</th> -->
                <th>Caminho</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
        @foreach($files as $file)
            <tr>
                <td style="width:15%;">{{ $file->name }}</td>
              
                <td style="width:80%;">{{ $file->path }}</td>
                <td style="width:5%;">
                    {!! Form::open(['route' => ['files.destroy', $file->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Está certo disso?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                

              

              

            
               
                
                   

              

                
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

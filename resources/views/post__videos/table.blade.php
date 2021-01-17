<div class="table-responsive">
    <table class="table" id="postVideos-table">
        <thead>
            <tr>
                <th>Vídeo</th>   
                <th>Publicação</th>             
                <th>Publicado</th>
                <th>Publicado por</th>
                <th>Atualizado por</th>                
                <th colspan="3">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($postVideos as $postVideo)
            <tr>
                <td>
                    <iframe width="150" height="100" src="https://www.youtube.com/embed/{{$postVideo->video_id}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin-bottom:20px;"></iframe>
                </td>   
                <td><a href="{{ route('posts.show', [$postVideo->post->id]) }}">{{ $postVideo->post->title }}</a></td>         
                <td>
                    @if($postVideo->published == 1)
                        <span class="fa fa-check"></span>
                    @else
                        <span class="fa fa-times"></span>
                    @endif
                </td>
                <td>{{ $postVideo->owner->name }}</td>
                <td>{{ $postVideo->updater->name ?? '---' }}</td>                
                <td>
                    {!! Form::open(['route' => ['postVideos.destroy', $postVideo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('postVideos.show', [$postVideo->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('postVideos.edit', [$postVideo->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

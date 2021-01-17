<div class="table-responsive">
    <table class="table" id="banners-table">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Imagem</th>
                <th>Link</th>
                <th>Descrição</th>
                <th>Promoção</th>
                <th>Local do Banner</th>
                <th>Publicado ?</th>
                <th>Tags</th>
                <th colspan="3">Acões</th>
            </tr>
        </thead>
        <tbody>
        @foreach($banners as $banner)
            <tr>
                <td>{{ $banner->title }}</td>
                <td><img src="{{ $banner->image }}" class="img-thumbnail" style="width:70px; height:50px;"></td>
                <td>
                @if($banner->link)
                    <span class="fa fa-check text-success"></span>
                @else
                    <span class="fa fa-close text-danger"></span>
                @endif  
                </td>
                <td  style="width:30%">{{ Illuminate\Support\Str::limit($banner->body,150) }}</td>
                <td>{{ $banner->promotion }}</td>
                <td>{{ $banner->location }}</td>
                <td>
                @if($banner->published)
                    <span class="fa fa-check text-success"></span>
                @else
                    <span class="fa fa-close text-danger"></span>
                @endif  
                </td>
                <td>
                    @forelse($banner->tags->sortBy('name') as $tags)
                        <a href="?tag={{ $tags->name }}" class="btn btn-primary btn-sm">{{ $tags->name }}</a>
                    @empty
                        <span class="text-danger">Sem tag</span>
                    @endforelse
                </td>
                <td>
                    {!! Form::open(['route' => ['banners.destroy', $banner->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('banners.show', [$banner->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('banners.edit', [$banner->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que deseja excluir?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$banners->links()}}
</div>

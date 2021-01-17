<div class="table-responsive">
    <table class="table" id="packages-table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Subtítulo</th>
                <th>Descrição</th>
                <th>Foto Principal</th>
                <th>Preço</th>
                <th>Publicado ?</th>
                <th>Tags</th>
                <th colspan="3">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($packages as $package)
            <tr>
                <td>{{ $package->title }}</td>
                <td>{{ $package->subtitle }}</td>
                <td style="width:40%">{{ Illuminate\Support\Str::limit($package->body,200)}}</td>
                <td><img src="{{ $package->main_image }}"  class="img-thumbnail" style="width:70px;height:70px;"></td>
                <td>${{ $package->price }}</td>
                <td>
                @if($package->published)
                    <span class="fa fa-check text-success"></span>
                @else
                    <span class="fa fa-close text-danger"></span>
                @endif
                </td>
                <td>
                    @forelse($package->tags->sortBy('name') as $tags)
                        <a href="?tag={{ $tags->name }}" class="btn btn-primary btn-sm">{{ $tags->name }}</a>
                    @empty
                        <span class="text-danger">Sem tag</span>
                    @endforelse
                </td>
                <td  style="width:3%">
                    {!! Form::open(['route' => ['packages.destroy', $package->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('packages.show', [$package->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('packages.edit', [$package->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem certeza que deseja excluir?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $packages->links() }}
</div>

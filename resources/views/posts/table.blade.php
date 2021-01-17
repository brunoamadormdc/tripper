<div class="table-responsive">
    <table class="table" id="posts-table">
        <thead>
            <tr>
                <th>Título</th>
                <!-- <th>Sub-titulo</th> -->
                <th>Resumo</th>
                <!-- <th>Texto</th> -->
                <th>Preço</th>
                <th>Reserva</th>
                <!-- <th>Texto do Link da Reserva</th> -->
                <th>Externo</th>
                <!-- <th>Texto da Fonte</th> -->
                <th>Fonte</th>
                <th>Imagem Principal</th>
                <th>Imagem Secundária</th>
                <th>Página</th>
                <th>Categoria</th>
                <th>Tags</th>
                <th>Publicado</th>
                <th style="width:10%;">Criado por</th>
                <!-- <th>Atualizado por</th> -->
                <th style="width:10%;">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td style="width:7%;">{{ $post->title }}</td>
               <!--  <td>{{ $post->subtitle }}</td> -->
                <td style="width:13%;">{{ $post->summary }}</td>
                <!-- <td>{{ $post->body }}</td> -->
                <td>{{ $post->price }}</td>

                <td>
                    @if($post->booking_link != null)
                        <span class="fa fa-check"></span>
                    @else
                    <span class="fa fa-times"></span>
                    @endif
                </td>

                <!-- <td>{{ $post->booking_link_text }}</td> -->

                <td>
                    @if($post->external_link != null)
                        <span class="fa fa-check"></span>
                    @else
                    <span class="fa fa-times"></span>
                    @endif
                </td>

               <!--  <td>{{ $post->font_text }}</td> -->

                <td>
                    @if($post->font_link != null)
                        <span class="fa fa-check"></span>
                    @else
                    <span class="fa fa-times"></span>
                    @endif
                </td>
                <td><img src="{{ $post->main_image }}" width="100" class="img-responsive"></td>
                <td><img src="{{ $post->secondary_image }}" width="100" class="img-responsive"></td>
                <td style="width:3%;">{{ $post->page }}</td>
                <td>{{ $post->category->name }}</td>
                <td>
                    @forelse($post->tags->sortBy('name') as $tags)
                        <a href="?tag={{ $tags->name }}" class="btn btn-primary btn-sm">{{ $tags->name }}</a>
                    @empty
                        <span class="text-danger">Sem tag</span>
                    @endforelse
                </td>
                <td>
                    @if($post->published == 1)
                        <span class="fa fa-check"></span>
                    @else
                    <span class="fa fa-times"></span>
                    @endif
                </td>

                <td>{{ $post->owner->name}}</td>
               <!--  <td>
                    @if($post->updated_by != null)
                        {{ $post->updater->name }}
                    @else

                    @endif
                </td> -->

                <td>
                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('posts.show', [$post->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('posts.edit', [$post->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@if(Auth()->user()->role == 2)
<!-- <li class="{{ Request::is('registrationKeys*') ? 'active' : '' }}">
    <a href="{{ route('registrationKeys.index') }}"><i class="fa fa-key"></i><span>Registration  Keys</span></a>
</li> -->

<li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-user"></i><span>Usuários do Sistema</span></a>
</li>
@endif


<li class="{{ Request::is('admin/banners*') ? 'active' : '' }}">
    <a href="{{ route('banners.index') }}"><i class="fa fa-image"></i><span>Banners</span></a>
</li>

<li class="{{ Request::is('admin/categories*') ? 'active' : '' }}">
    <a href="{{ route('categories.index') }}"><i class="fa fa-edit"></i><span>Categorias</span></a>
</li>

<li class="{{ Request::is('admin/posts*') ? 'active' : '' }}">
    <a href="{{ route('posts.index') }}"><i class="fa fa-edit"></i><span>Publicações</span></a>
</li>

<li class="{{ Request::is('admin/postPhotos*') ? 'active' : '' }}">
    <a href="{{ route('postPhotos.index') }}"><i class="fa fa-edit"></i><span>Fotos das Publicações</span></a>
</li>

<li class="{{ Request::is('admin/postDetails*') ? 'active' : '' }}">
    <a href="{{ route('postDetails.index') }}"><i class="fa fa-edit"></i><span>Detalhes das Publicações</span></a>
</li>

<li class="{{ Request::is('admin/postVideos*') ? 'active' : '' }}">
    <a href="{{ route('postVideos.index') }}"><i class="fa fa-edit"></i><span>Vídeos das Publicações</span></a>
</li>

<li class="{{ Request::is('postComments*') ? 'active' : '' }}">
    <a href="{{ route('postComments.index') }}"><i class="fa fa-edit"></i><span>Comentários das Publicações</span></a>
</li>
<li class="{{ Request::is('files*') ? 'active' : '' }}">
    <a href="{{ route('files.index') }}"><i class="fa fa-edit"></i><span>Arquivos</span></a>
</li>


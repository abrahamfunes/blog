<li class="header">MENU PRINCIPAL</li>
<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{!! route('home') !!}"><i class="fa fa-dashboard"></i><span>Indicadores</span></a>
</li>
<li class="header">BLOG</li>
@if(\Auth::user()->hasAnyRole(['admin.general', 'admin.sup']))
    <li class="{{ Request::is('categories*') || Request::is('posts*') || Request::is('comments*') || Request::is('news*') ? 'active' : '' }} treeview">
        <a href="#">
            <i class="fa fa-file-text-o"></i> <span>Administrar Blog</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            {{--<li class="{{ Request::is('categories*') ? 'active' : '' }}"><a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Categorías</span></a></li>--}}
            <li class="{{ Request::is('posts*') ? 'active' : '' }}"><a href="{!! route('posts.index') !!}"><i class="fa fa-edit"></i><span>Posts</span></a></li>
            {{--<li class="{{ Request::is('news*') ? 'active' : '' }}"><a href="{!! route('news.index') !!}"><i class="fa fa-edit"></i><span>Noticias</span></a></li>--}}
            <li class="{{ Request::is('comments*') ? 'active' : '' }}"><a href="{!! route('comments.index') !!}"><i class="fa fa-edit"></i><span>Comentarios</span></a></li>
        </ul>
    </li>
@endif



<li class="header">CONFIGURACION</li>
@if(\Auth::user()->hasAnyRole(['admin.general', 'admin.sup']))
    <li class="{{ Request::is('users*') ? 'active' : '' }} treeview">
        <a href="#">
            <i class="fa fa-users"></i> <span>Usuarios del sistema</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('users') ? 'active' : '' }}"><a href="{!! route('users.index') !!}"><i class="fa fa-circle-o"></i><span>Administrar Usuarios</span></a></li>
            <li class="{{ Request::is('users/create') ? 'active' : '' }}"><a href="{!! route('users.create') !!}"><i class="fa fa-circle-o"></i><span>Nuevo Usuario</span></a></li>
        </ul>
    </li>
@endif




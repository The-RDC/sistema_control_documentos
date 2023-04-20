<!-- Sidebar -->
<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#" id="logoNombreEmpresa">
        <div class="container-fluid">
            <div class="row">
                <div class="sidebar-brand-icon">
                    <!--i class="fas fa-laugh-wink"></i-->
                    <img src="{{asset('img/logoSimonBolivar.jpg')}}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="row">
                <div class="sidebar-brand-text mx-3">Simon Bolivar</div>
            </div>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Panel de Administrador</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @can('cargo-list')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-briefcase"></i>
        <span>Cargo</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Cargo</h6>
            <a class="collapse-item" href="{{ route('cargo.index') }}">Listar Cargos</a>
        </div>
    </div>
</li>
    @endcan
     @can('regional-list')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#regionales"
       aria-expanded="true" aria-controls="collapseTwo">
       <i class="fas fa-sitemap"></i>
        <span>Regionales</span>
    </a>
    <div id="regionales" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Regional</h6>
            <a class="collapse-item" href="{{ route('regional.index') }}">Listar Regionales</a>
        </div>
    </div>
</li>
@endcan
     @can('empresa-list')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#empresa"
       aria-expanded="true" aria-controls="collapseTwo">
       <i class="fas fa-building"></i>
        <span>Empresa</span>
    </a>
    <div id="empresa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Empresa</h6>
            <a class="collapse-item" href="{{ route('empresa.index') }}">Listar Empresa</a>
        </div>
    </div>
</li>
@endcan
     @can('estadoDocumento-list')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#esdoc"
       aria-expanded="true" aria-controls="collapseTwo">
       <i class="far fa-check-square"></i>
        <span>Estado Documento</span>
    </a>
    <div id="esdoc" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Estado Documento</h6>
            <a class="collapse-item" href="{{ route('estadoDocumento.index') }}">Listar estado documentos</a>
        </div>
    </div>
</li>
@endcan
     @can('empleado-list')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#emp"
       aria-expanded="true" aria-controls="collapseTwo">
       <i class="fas fa-user-tie"></i>
        <span>Empleado</span>
    </a>
    <div id="emp" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Empleado</h6>
            <a class="collapse-item" href="{{ route('empleado.index') }}">Listar Empleado</a>
        </div>
    </div>
</li>
@endcan
     @can('listarDocumento-list')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDocuemento"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-list"></i>
        <span>Documento</span>
    </a>
    <div id="collapseDocuemento" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Documento:</h6>
            <a class="collapse-item" href="" id="listar-documentos">Listar Documentos</a>
        </div>
    </div>
</li>
@endcan
     @can('registroDocumento-list')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRegistroDocumento"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-folder-open"></i>
        <span>Registro Documento</span>
    </a>
    <div id="collapseRegistroDocumento" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Registro Documento</h6>
            <a class="collapse-item" href="{{ route('registroDocumento.index') }}" id="listar-regDocumento">Listar documentos</a>
        </div>
    </div>
</li>
@endcan
     @can('sucursal-list')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSucursal"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-city"></i>
        <span>Sucursal</span>
    </a>
    <div id="collapseSucursal" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sucursal</h6>
            <a class="collapse-item" href="{{ route('sucursal.index') }}" id="listar-sucrusal">Listar Sucursales</a>
        </div>
    </div>
</li>
@endcan
     @can('tipoDocumento-list')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTipoDocumento"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-file"></i>
        <span>Tipo Documento</span>
    </a>
    <div id="collapseTipoDocumento" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tipo de Documento</h6>
            <a class="collapse-item" href="{{ route('tipoDocumento.index') }}" id="listar-tipoDocumento">Listar Tipos Documento</a>
        </div>
    </div>
</li>
@endcan
     @can('unidad-list')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUnidades"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fab fa-unity"></i>
        <span>Unidades</span>
    </a>
    <div id="collapseUnidades" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Unidades</h6>
            <a class="collapse-item" href="{{ route('unidad.index') }}" id="listar-unidades">Listar unidades</a>
        </div>
    </div>
</li>
@endcan
    @can('role-list')
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#usuarios"
       aria-expanded="true" aria-controls="collapseTwo">
       <i class="fas fa-users-cog"></i>
        <span>Gestion Usuario</span>
    </a>
    <div id="usuarios" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion usuarios</h6>
            <a class="collapse-item" href="{{ route('users.index') }}" id="listar-unidades">Listar Usuario</a>
            <a class="collapse-item" href="{{ route('roles.index') }}" id="listar-unidades">Listar Roles</a>
        </div>
    </div>
</li>
@endcan
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

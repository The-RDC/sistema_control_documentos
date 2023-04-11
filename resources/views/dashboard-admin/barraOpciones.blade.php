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
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Opciones Cargo</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Cargo</h6>
                <a class="collapse-item" href="" >Ingresar Cargos</a>
                <a class="collapse-item" href="{{ route('cargo.index') }}">Listar Cargos</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#regionales"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Regionales</span>
        </a>
        <div id="regionales" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Regional</h6>
                <a class="collapse-item" href="{{ route('regional.index') }}">Listar Regionales</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#empresa"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Empresa</span>
        </a>
        <div id="empresa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Empresa</h6>
                <a class="collapse-item" href="{{ route('empresa.index') }}">Listar Empresa</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#esdoc"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Estado Documento</span>
        </a>
        <div id="esdoc" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Estado Documento</h6>
                <a class="collapse-item" href="{{ route('estadoDocumento.index') }}">Listar estado documentos</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
<<<<<<< HEAD
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#emp"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Empleado</span>
        </a>
        <div id="emp" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Empleado</h6>
                <a class="collapse-item" href="{{ route('empleado.index') }}">Listar Empleado</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUnidades"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Opciones Unidades</span>
        </a>
        <div id="collapseUnidades" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Unidades</h6>
                <a class="collapse-item" href="" id="ingresar-cargos">Ingresar Unidad</a>
                <a class="collapse-item" href="{{ route('unidad.index') }}" id="listar-unidades">Listar unidades</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
=======
>>>>>>> 69f0f633259946e9fd40a094e13626507d623143
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDocuemento"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Opciones Documento</span>
        </a>
        <div id="collapseDocuemento" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Documento:</h6>
                <a class="collapse-item" href="" id="ingresar-documentos">Registro Documento</a>
                <a class="collapse-item" href="" id="listar-documentos">Listar Documentos</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRegistroDocumento"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Registro Documento</span>
        </a>
        <div id="collapseRegistroDocumento" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Registro Documento</h6>
                <a class="collapse-item" href="{{ route('registroDocumento.index') }}" id="listar-regDocumento">Listar documentos</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSucursal"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Opciones Sucursal</span>
        </a>
        <div id="collapseSucursal" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sucursal</h6>
                <a class="collapse-item" href="{{ route('sucursal.index') }}" id="listar-sucrusal">Listar Sucursales</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTipoDocumento"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Tipo Documento</span>
        </a>
        <div id="collapseTipoDocumento" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tipo de Documento</h6>
                <a class="collapse-item" href="{{ route('tipoDocumento.index') }}" id="listar-tipoDocumento">Listar Tipos Documento</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUnidades"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Opciones Unidades</span>
        </a>
        <div id="collapseUnidades" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Unidades</h6>
                <a class="collapse-item" href="{{ route('unidad.index') }}" id="listar-unidades">Listar unidades</a>
            </div>
        </div>
    </li>

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

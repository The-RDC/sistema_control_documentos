@include('dashboard-admin.header',['titulo'=>'Administrador'])
<body id="page-top">
    <div id="wrapper">
        @include('dashboard-admin.barraOpciones')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('dashboard-admin.barraLogin')
                @section('informacion')
            </div>
            @include('dashboard-admin.footer')
        </div>    
    </div>
    @include('dashboard-admin.modales')
    @include('dashboard-admin.javascript')
</body>
</html>


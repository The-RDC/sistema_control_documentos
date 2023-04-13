 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
             <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span>
             </button>
         </div>
         <div class="modal-body">
             Desea salir del sistema.</div>
         <div class="modal-footer">
             <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
             <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                 {{ __('Salir') }}
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
         </div>
     </div>
 </div>
</div>


 <!-- Modal Para finalizar el documento-->
 <div class="modal fade" id="EstadoFinalizarDocumento" tabindex="-1" role="dialog" aria-labelledby="ModalbtnEstadoFinalizar"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title">Esta seguro de Finalizar el Documento</h5>
             <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">X</span>
             </button>
         </div>
         <div class="modal-body" id="ModalBodyEstadoFinalizarDocumento">
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-success" id="btnModalEstadoFinalizarDocumento">Si, guardar</button>
             <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
         </div>
     </div>
 </div>
</div>

<script>
    var rutaUpdateRegistroDocumento="{{route('actualizar')}}";
    var fechaFinalRegistroDocumento="{{date('Y-m-d H:i')}}";
</script>

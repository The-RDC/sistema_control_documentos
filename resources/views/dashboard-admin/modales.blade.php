 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Esta Seguro de Salir?</h5>
             <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span>
             </button>
         </div>
         <div class="modal-body">
             Desea salir del sistema.</div>
         <div class="modal-footer">
             <a class="btn btn-success" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                 {{ __('Si') }}
             </a>
             <button class="btn btn-warning" type="button" data-dismiss="modal">No</button>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
         </div>
     </div>
 </div>
</div>


 <!-- Modal Para finalizar el documento-->
 <div class="modal fade" id="Mensajes" tabindex="-1" role="dialog" aria-labelledby="ModalMensajes"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="ModalTitleMensajes"></h5>
             <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">X</span>
             </button>
         </div>
         <div class="modal-body" id="ModalBodyMensajes">
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-warning" id="btnModalMensajes">Si</button>
             <button class="btn btn-danger" type="button" data-dismiss="modal">No</button>
         </div>
     </div>
 </div>
</div>

<script>
    var rutaUpdateRegistroDocumento="{{route('actualizar')}}";
    var fechaFinalRegistroDocumento="{{date('Y-m-d H:i')}}";
</script>

@auth
    

<!-- Modal de Registrar-->
<div class="modal fade" id="registra" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registro de Diezmo en la iglesia {{Auth::user()->esMiembro()->last()}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{route('diezmos.store')}}" method="post" id="registraDiezmoForm">
                    @csrf

                    @include('diezmos.partials.form')
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cerrar</button>
                <button type="button" class="btn btn-primary" id="registrar">Registrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Editar-->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="z-index: 1600">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editando Diezmo en la iglesia {{Auth::user()->esMiembro()->last()}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{route('diezmos.update', ':DIEZMO-ID')}}" method="post" id="editDiezmoForm">
                    @csrf
                    <input type="hidden" name="id" value="">
                    @include('diezmos.partials.form')
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarEdit" >Cerrar</button>
                <button type="button" class="btn btn-primary" id="actualizar">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Ver-->
<div class="modal fade" id="ver" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="z-index: 1400">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lista de tus Diezmos en la iglesia {{Auth::user()->esMiembro()->last()}}</h5>
                @csrf
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
          
            <div class="modal-body">
                <div class="row justify-content-center">
                    <table class=" display nowrap" id="showDiezmo">
                        <thead class="thead-inverse">
                            <tr>
                                
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Monto</th>
                                <th>Referencia</th>
                                <th>Opciones</th>
                                
                                
                            </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    
                                    <td scope="row"></td>
                                    <td ></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  data-dismiss="modal" id="cerrarDiezmo">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Nuevo Miembro -->


<!-- Modal -->
<div class="modal fade" id="createMiembro" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrando nuevo miembro a la iglesia {{Auth::user()->esMiembro()->last()}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{route('users.storeMiembro')}}" method="post" id="nuevoMiembroForm">
                    @csrf
                    @include('auth.partials.form')
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarCreateMiembro">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
            </div>
        </div>
    </div>
</div>



@endauth

             
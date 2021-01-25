
<div class="" id="categorias" hidden>
    <hr>
    <label>Seleccione las Categoria a registrar:</label>
    <div class="form-group col-sm-12">
        <label class="pasivo form-check-label col-sm-6" hidden>
            <input   type="checkbox" class="form-check-input" name="categorias[]" id="Fondo_Local_check" value="Fondo_Local" >
            Fondo de la Iglesia Local
        </label>
        <label class="pasivo form-check-label col-sm-offset-6" hidden>
            <input   type="checkbox" class="form-check-input" name="categorias[]" id="Diezmo_Restante_check" value="Diezmo_Restante" >
            Diezmo Restante de la Iglesia Local
        </label>
        <label class="pasivo finanza form-check-label col-sm-6 " hidden>
            <input   type="checkbox" class="form-check-input  " name="categorias[]" id="Damas_check" value="Damas" >
            Ofrenda ministerio de Damas <sub>(50%)</sub>
        </label>
        <label class="pasivo finanza form-check-label col-sm-offset-6 " hidden>
            <input   type="checkbox" class="form-check-input " name="categorias[]" id="Jovenes_check" value="Jovenes" >
            Ofrendas ministerio de Jovenes <sub>(50%) </sub>
        </label>
        <label class="pasivo finanza form-check-label col-sm-6 " hidden>
            <input   type="checkbox" class="form-check-input " name="categorias[]" id="Niños_check" value="Niños" >
            Ofrenda ministerio de Niños <sub>(50%)</sub>
        </label>
        <label class="pasivo finanza form-check-label col-sm-offset-6 " hidden>
            <input   type="checkbox" class="form-check-input " name="categorias[]" id="DLD_check" value="DLD" >
            Ofrenda Dept. de Liderazgo y Discipulado  <sub>(50%) </sub>
        </label>
        <label class="pasivo finanza form-check-label col-sm-6 " hidden>
            <input   type="checkbox" class="form-check-input " name="categorias[]" id="Caballeros_check" value="Caballeros" >
            Ofrenda ministerio de Caballeros <sub>(50%)</sub>
        </label>
        <label class="pasivo finanza form-check-label col-sm-offset-6 " hidden>
            <input   type="checkbox" class="form-check-input " name="categorias[]" id="Patrimonio_Historico_check" value="Patrimonio_Historico" >
            Ofrenda ministerio Patrimonio Historico  <sub>(50%) </sub>
        </label>
        <label class="finanza form-check-label col-sm-6" hidden>
            <input   type="checkbox" class="form-check-input" name="categorias[]" id="Diezmo_Total_check" value="Diezmo_Total" >
            Total de diezmos recibidos en la iglesia local
        </label>
        <label class="finanza form-check-label  col-ms-offset-6" hidden>
            <input   type="checkbox" class="form-check-input" name="categorias[]" id="Diezmo_Pastor_check" value="Diezmo_Pastor" >
            Diezmo pastor local  <sub> (10%) (incluye ministros laicos que pastorean)</sub>
        </label>
        <label class="finanza form-check-label col-sm-6" hidden>
            <input   type="checkbox" class="form-check-input " name="categorias[]" id="Diezmo_Ministro_check" value="Diezmo_Ministros" >
            Diezmo otros ministros licenciados <sub>(10%) </sub>
        </label>
        
        <label class="finanza form-check-label col-sm-offset-6" hidden>
            <input   type="checkbox" class="form-check-input" name="categorias[]" id="Domingo_2_check" value="Domingo_2" >
            Ofrenda segundo Domingo 
        </label>
        <label class="finanza form-check-label col-sm-6" hidden>
            <input   type="checkbox" class="form-check-input" name="categorias[]" id="Domingo_3_check" value="Domingo_3" >
            Ofrenda tercer Domingo 
        </label>
        <label class="finanza form-check-label col-sm-offset-6" hidden>
            <input   type="checkbox" class="form-check-input" name="categorias[]" id="Domingo_4_check" value="Domingo_4" >
            Ofrenda cuarto Domingo 
        </label>
        <label class="finanza form-check-label col-sm-6" hidden>
            <input   type="checkbox" class="form-check-input" name="categorias[]" id="Impulso_Mundial_check" value="Impulso_Mundial" >
            Ofrenda Impulso Misionero Mundial  <sub>(75%) Marzo y Octubre</sub>
        </label>
        <label class="finanza form-check-label col-sm-offset-6" hidden>
            <input   type="checkbox" class="form-check-input" name="categorias[]" id="Impulso_Nacional_check" value="Impulso_Nacional" >
            Ofrenda Impulso Misionero Nacional <sub>(100%) Junio</sub>
        </label>
        <label class="finanza form-check-label col-sm-6" hidden>
            <input   type="checkbox" class="form-check-input" name="categorias[]" id="Tabernaculo_Nacional_check" value="Tabernaculo_Nacional" >
            Ayuda al Tabernaculo Nacional
        </label>
        <label class="finanza form-check-label col-sm-offset-6" hidden>
            <input   type="checkbox" class="form-check-input" name="categorias[]" id="Pago_Prestamos_check" value="Pago_Prestamos" >
            Pago de Prestamos
        </label>
        <label class="finanza form-check-label col-sm-6" hidden>
            <input   type="checkbox" class="form-check-input" name="categorias[]" id="Otros_Propositos_check" value="Otros_Propositos" >
            Dinero para Otros Propósitos <sub>(Espeficifique en Descripción)</sub>
        </label>
        
        
    </div>
    <hr>
</div>

<h3><label id="title" class="d-flex justify-content-center"></label></h3>


<div class="" >
    
    

    <ul class="list-group list-group-unbordered mb-3">
        <!--Total de diezmos recibidos en la iglesia local-->
        <li class="list-group-item Diezmo_Total" id="" hidden>
            <div class="row">
                <label class="col-sm-12"> <u> Total de diezmos recibidos en la iglesia local </u></label>
                <div class="col-sm-4">
                    <p>Fecha</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Diezmo_Total" name="fecha_Diezmo_Total">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Monto</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control Diezmo_Total" name="monto_Diezmo_Total">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Descripción</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Diezmo_Total" name="descripcion_Diezmo_Total">
                    </div>
                </div>
            </div>
        </li>
        <!-- Diezmo pastor local -->
        <li class="list-group-item Diezmo_Pastor" id="" hidden>
            <div class="row">
                <label class="col-sm-12"><u> Diezmo pastor local  <sub> (10%) (incluye ministros laicos que pastorean)</sub> </u> </label>
                <div class="col-sm-4">
                    <p>Fecha</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Diezmo_Pastor" name="fecha_Diezmo_Pastor">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Monto</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control Diezmo_Pastor" name="monto_Diezmo_Pastor">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Descripción</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Diezmo_Pastor" name="descripcion_Diezmo_Pastor">
                    </div>
                </div>
            </div>
        </li>
        <!-- Diezmo otros ministros licenciados <sub>(10%) </sub> -->
        <li class="list-group-item Diezmo_Ministros" id="" hidden>
            <div class="row">
                <label class="col-sm-12"> <u> Diezmo otros ministros licenciados <sub>(10%) </sub> </u> </label>
                <div class="col-sm-4">
                    <p>Fecha</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Diezmo_Ministros" name="fecha_Diezmo_Ministros">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Monto</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control Diezmo_Ministros" name="monto_Diezmo_Ministros">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Descripción</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Diezmo_Ministros" name="descripcion_Diezmo_Ministro">
                    </div>
                </div>
            </div>
        </li>
        <!--Ofrenda ministerio de Damas <sub>(50%)</sub>-->
        <li class="list-group-item Damas" id="" hidden>
            <div class="row">
                <label class="col-sm-12"><u> Ofrenda ministerio de Damas <sub>(50%)</sub> </u> </label>
                <div class="col-sm-4">
                    <p>Fecha</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Damas" name="fecha_Damas">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Monto</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control Damas" name="monto_Damas">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Descripción</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Damas" name="descripcion_Damas">
                    </div>
                </div>
            </div>
        </li>
        <!-- Ofrendas ministerio de Jovenes <sub>(50%) </sub> -->
        <li class="list-group-item Jovenes" id="" hidden>
            <div class="row">
                <label class="col-sm-12"><u> Ofrendas ministerio de Jovenes <sub>(50%) </sub> </u></label>
                <div class="col-sm-4">
                    <p>Fecha</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Jovenes" name="fecha_Jovenes">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Monto</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control Jovenes" name="monto_Jovenes">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Descripción</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Jovenes" name="descripcion_Jovenes">
                    </div>
                </div>
            </div>
        </li>
        <!-- Ofrenda ministerio de Niños <sub>(50%)</sub>-->
        <li class="list-group-item Niños" id="" hidden>
            <div class="row">
                <label class="col-sm-12"><u> Ofrenda ministerio de Niños <sub>(50%)</sub> </u></label>
                <div class="col-sm-4">
                    <p>Fecha</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Niños" name="fecha_Niños">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Monto</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control Niños" name="monto_Niños">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Descripción</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Niños" name="descripcion_Niños">
                    </div>
                </div>
            </div>
        </li>
        <!-- Ofrenda Dept. de Liderazgo y Discipulado  <sub>(50%) </sub> -->
        <li class="list-group-item DLD" id="" hidden>
            <div class="row">
                <label class="col-sm-12"><u> Ofrenda Dept. de Liderazgo y Discipulado  <sub>(50%) </sub> </u></label>
                <div class="col-sm-4">
                    <p>Fecha</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control DLD" name="fecha_DLD">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Monto</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control DLD" name="monto_DLD">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Descripción</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control DLD" name="descripcion_DLD">
                    </div>
                </div>
            </div>
        </li>
        <!-- Ofrenda ministerio de Caballeros <sub>(50%)</sub> -->
        <li class="list-group-item Caballeros" id="" hidden>
            <div class="row">
                <label class="col-sm-12"><u> Ofrenda ministerio de Caballeros <sub>(50%)</sub> </u></label>
                <div class="col-sm-4">
                    <p>Fecha</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Caballeros" name="fecha_Caballeros">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Monto</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control Caballeros" name="monto_Caballeros">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Descripción</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Caballeros" name="descripcion_Caballeros">
                    </div>
                </div>
            </div>
        </li>
        <!-- Ofrenda ministerio Patrimonio Historico  <sub>(50%) </sub> -->
        <li class="list-group-item Patrimonio_Historico" id="" hidden>
            <div class="row">
            <label class="col-sm-12"><u>Ofrenda ministerio Patrimonio Historico  <sub>(50%) </sub></u></label>
            <div class="col-sm-4">
                <p>Fecha</p>
                <div class="form-group">
                    <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Patrimonio_Historico" name="fecha_Patrimonio_Historico">
                </div>
            </div>
            <div class="col-sm-4">
                <p>Monto</p>
                <div class="form-group">
                    <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control Patrimonio_Historico" name="monto_Patrimonio_Historico">
                </div>
            </div>
            <div class="col-sm-4">
                <p>Descripción</p>
                <div class="form-group">
                    <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Patrimonio_Historico" name="descripcion_Patrimonio_Historico">
                </div>
            </div>
            </div>
        </li>
        <!-- Ofrenda segundo Domingo -->
        <li class="list-group-item Domingo_2" id="" hidden>
            <div class="row">
                <label class="col-sm-12"><u> Ofrenda segundo Domingo </u> </label>
                <div class="col-sm-4">
                    <p>Fecha</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Domingo_2" name="fecha_Domingo_2">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Monto</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control Domingo_2" name="monto_Domingo_2">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Descripción</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Domingo_2" name="descripcion_Domingo_2">
                    </div>
                </div>
            </div>
        </li>
        <!-- Ofrenda tercer Domingo -->
        <li class="list-group-item Domingo_3" id="" hidden>
            <div class="row">
                <label class="col-sm-12"><u> Ofrenda tercer Domingo </u> </label>
                <div class="col-sm-4">
                    <p>Fecha</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Domingo_3" name="fecha_Domingo_3">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Monto</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control Domingo_3" name="monto_Domingo_3">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Descripción</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Domingo_3" name="descripcion_Domingo_3">
                    </div>
                </div>
            </div>
        </li>
        <!-- Ofrenda cuarto Domingo -->
        <li class="list-group-item Domingo_4" id="" hidden>
            <div class="row">
                <label class="col-sm-12"><u>Ofrenda cuarto Domingo</u></label>
                <div class="col-sm-4">
                    <p>Fecha</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Domingo_4" name="fecha_Domingo_4">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Monto</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control Domingo_4" name="monto_Domingo_4">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Descripción</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Domingo_4" name="descripcion_Domingo_4">
                    </div>
                </div>
            </div>
        </li>
        <!-- Ofrenda Impulso Misionero Mundial  <sub>(75%) Marzo y Octubre</sub> -->
        <li class="list-group-item Impulso_Mundial" id="" hidden>
            <div class="row">
                <label class="col-sm-12"><u> Ofrenda Impulso Misionero Mundial  <sub>(75%) Marzo y Octubre</sub> </u></label>
                <div class="col-sm-4">
                    <p>Fecha</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Impulso_Mundial" name="fecha_Impulso_Mundial">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Monto</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control Impulso_Mundial" name="monto_Impulso_Mundial">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Descripción</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Impulso_Mundial" name="descripcion_Impulso_Mundial">
                    </div>
                </div>
            </div>
        </li>
        <!-- Ofrenda Impulso Misionero Nacional <sub>(100%) Junio</sub> -->
        <li class="list-group-item Impulso_Nacional" id="" hidden>
            <div class="row">
            <label class="col-sm-12"><u>Ofrenda Impulso Misionero Nacional <sub>(100%) Junio</sub></u></label>
            <div class="col-sm-4">
                <p>Fecha</p>
                <div class="form-group">
                    <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Impulso_Nacional" name="fecha_Impulso_Nacional">
                </div>
            </div>
            <div class="col-sm-4">
                <p>Monto</p>
                <div class="form-group">
                    <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control Impulso_Nacional" name="monto_Impulso_Nacional">
                </div>
            </div>
            <div class="col-sm-4">
                <p>Descripción</p>
                <div class="form-group">
                    <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Impulso_Nacional" name="descripcion_Impulso_Nacional">
                </div>
            </div>
            </div>
        </li>
        <!-- Ayuda al Tabernaculo Nacional -->
        <li class="list-group-item Tabernaculo_Nacional" id="" hidden>
            <div class="row">
                <label class="col-sm-12"><u>Ayuda al Tabernaculo Nacional</u></label>
                <div class="col-sm-4">
                    <p>Fecha</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Tabernaculo_Nacional" name="fecha_Tabernaculo_Nacional">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Monto</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control Tabernaculo_Nacional" name="monto_Tabernaculo_Nacional">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Descripción</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Tabernaculo_Nacional" name="descripcion_Tabernaculo_Nacional">
                    </div>
                </div>
            </div>
        </li>
        <!-- Pago de Prestamos -->
        <li class="list-group-item Pago_Prestamos" id="" hidden>
            <div class="row">
            <label class="col-sm-12"><u>Pago de Prestamos</u></label>
            <div class="col-sm-4">
                <p>Fecha</p>
                <div class="form-group">
                    <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Pago_Prestamos" name="fecha_Pago_Prestamos">
                </div>
            </div>
            <div class="col-sm-4">
                <p>Monto</p>
                <div class="form-group">
                    <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control Pago_Prestamos" name="monto_Pago_Prestamos">
                </div>
            </div>
            <div class="col-sm-4">
                <p>Descripción</p>
                <div class="form-group">
                    <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Pago_Prestamos" name="descripcion_Pago_Prestamos">
                </div>
            </div>
            </div>
        </li>
        <!-- Dinero para Otros Propósitos <sub>(Espeficifique en Descripción)</sub> -->
        <li class="list-group-item Otros_Propositos" id="" hidden>
            <div class="row">
                <label class="col-sm-12"><u>Dinero para Otros Propósitos <sub>(Espeficifique en Descripción)</sub></u></label>
                <div class="col-sm-4">
                    <p>Fecha</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Otros_Propositos" name="fecha_Otros_Propositos">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Monto</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control Otros_Propositos" name="monto_Otros_Propositos">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Descripción</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Otros_Propositos" name="descripcion_Otros_Propositos">
                    </div>
                </div>
            </div>
        </li>
        <!-- Diezmo Restante -->
        <li class="list-group-item Diezmo_Restante" id="" hidden>
            <div class="row">
                <label class="col-sm-12"><u>Diezmos Restante de la Iglesia Local</u></label>
                <div class="col-sm-4">
                    <p>Fecha</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->fecha }}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Diezmo_Restante" name="fecha_Diezmo_Restante">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Monto</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->monto }}"  @endif @endforeach @endisset type="number" class="form-control Diezmo_Restante" name="monto_Diezmo_Restante">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Descripción</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{ $finanzas->descripcion ?? 'Sin Descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Diezmo_Restante" name="descripcion_Diezmo_Restante">
                    </div>
                </div>
            </div>
        </li>
        <!-- Fondo Local -->
        <li class="list-group-item Fondo_Local" id="" hidden>
            <div class="row">
                <label class="col-sm-12"><u>Fondo de la Iglesia Local</u></label>
                <div class="col-sm-4">
                    <p>Fecha</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{$finanzas->fecha}}"  @endif @endforeach @endisset type="date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" class="form-control Fondo_Local" name="fecha_Fondo_Local">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Monto</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{$finanzas->monto}}"  @endif @endforeach @endisset type="number" class="form-control Fondo_Local" name="monto_Fondo_Local">
                    </div>
                </div>
                <div class="col-sm-4">
                    <p>Descripción</p>
                    <div class="form-group">
                        <input disabled required @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) value="{{$finanzas->descripcion ?? 'Sin descripción'}}"  @endif @endforeach @endisset type="text" class="form-control Fondo_Local" name="descripcion_Fondo_Local">
                    </div>
                </div>
            </div>
        </li>
    </ul>

   
    
    
    
    
    
</div>


<div class="" hidden id="boton">
    <div class="row">
        <!-- /.col -->
        <div class="col-auto">
            <button  type="submit" class="btn btn-block btn-success">
                {{ __('Guardar') }}
            </button>
        </div>
        
        <div class="col-auto" @isset($categorias) @foreach( $categorias as $categoria => $cate) @if($finanzas->categoria == $categoria) hidden @endif @endforeach @endisset>
            <button  type="reset" class="btn btn-block btn-danger">
                {{ __('Limpiar') }}
            </button>
        </div>
        <!-- /.col -->
    </div>
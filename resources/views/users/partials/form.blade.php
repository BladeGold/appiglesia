@isset($user)
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Nombres</label>
            <div class="input-group">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" @isset($user) value="{{$user->name}}" @endisset value="{{ old('name') }}">
                <div class="input-group">
                    <span class=" invalid" role="dialog"><strong class="name text-danger fs-6 fst-italic"> </strong></span>
                </div>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- /.input group -->
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Apellidos</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror"  autocapitalize="sentences"  name="last_name" @isset($user) value="{{$user->last_name}}" @endisset value="{{ old('last_name') }}" placeholder="Enter ..." >
            <div class="input-group">
                <span class=" invalid" role="dialog"><strong class="last_name text-danger fs-6 fst-italic"> </strong></span>
            </div>
            @error('last_name')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
</div>

@endisset
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Fecha de Nacimiento</label>
            <div class="input-group">
                <input type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento" @isset($user_date) value="{{$user_date->fecha_nacimiento}}" @endisset value="{{ old('fecha_nacimiento') }}" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false">
                <div class="input-group">
                    <span class=" invalid" role="dialog"><strong class="fecha_nacimiento text-danger fs-6 fst-italic"> </strong></span>
                </div>
                @error('fecha_nacimiento')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- /.input group -->
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Lugar de Nacimiento</label>
            <input type="text" class="form-control @error('lugar_nacimiento') is-invalid @enderror"  autocapitalize="sentences"  name="lugar_nacimiento" @isset($user_date) value="{{$user_date->lugar_nacimiento}}" @endisset value="{{ old('lugar_nacimiento') }}" placeholder="Enter ..." >
            <div class="input-group">
                <span class=" invalid" role="dialog"><strong class="lugar_nacimiento text-danger fs-6 fst-italic"> </strong></span>
            </div>
            @error('lugar_nacimiento')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Teléfono</label>
            <input type="tel" class="form-control @error('telefono') is-invalid @enderror"  name="telefono" @isset($user_date) value="{{$user_date->telefono}}" @endisset value="{{ old('telefono') }}" placeholder="Enter ..."></input>
            <div class="input-group">
                <span class=" invalid" role="dialog"><strong class="telefono text-danger fs-6 fst-italic"> </strong></span>
            </div>
            @error('telefono')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Cédula</label>
            <input type="number" class="form-control @error('cedula') is-invalid @enderror" name="cedula" @isset($user_date) disabled value="{{$user_date->cedula}}" @endisset value="{{ old('cedula') }}" rows="3" placeholder="Enter ..." ></input>
            <div class="input-group">
                <span class=" invalid" role="dialog"><strong class="cedula text-danger fs-6 fst-italic"> </strong></span>
            </div>
            @error('cedula')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <!-- select -->
        <div class="form-group">
            <label>Sexo</label>
            <select name="sexo" class="form-control @error('sexo') is-invalid @enderror">
                
                @if(isset($user_date))
                @else 
                <option value="" selected>-Seleciona una opcion-</option>
                @endif
                <option value="Masculino" @if(isset($user_date) && ($user_date->sexo=='Masculino')) selected @endif>Masculino</option>
                <option value="Femenino"@if(isset($user_date) && ($user_date->sexo=='Femenino')) selected @endif>Femenino</option>
            </select>
            <div class="input-group">
                <span class=" invalid" role="dialog"><strong class="sexo text-danger fs-6 fst-italic"> </strong></span>
            </div>
            @error('sexo')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Dirección</label>
            <input type="text" class="form-control @error('direccion') is-invalid @enderror" autocapitalize="sentences" name="direccion" @isset($user_date)  value="{{$user_date->direccion}}" @endisset value="{{ old('direccion') }}" placeholder="Enter ..." ></input>
            <div class="input-group">
                <span class=" invalid" role="dialog"><strong class="direccion text-danger fs-6 fst-italic"> </strong></span>
            </div>
            @error('direccion')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Ciudad</label>
            <input type="text" class="form-control @error('ciudad') is-invalid @enderror"  autocapitalize="sentences" name="ciudad" @isset($user_date)  value="{{$user_date->ciudad}}" @endisset value="{{ old('ciudad') }}" placeholder="Enter ..."></input>
            <div class="input-group">
                <span class=" invalid" role="dialog"><strong class="ciudad text-danger fs-6 fst-italic"> </strong></span>
            </div>
            @error('ciudad')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Estado</label>
            <input type="text" class="form-control @error('estado') is-invalid @enderror" autocapitalize="sentences" name="estado"  @isset($user_date)  value="{{$user_date->estado}}" @endisset  value="{{ old('estado') }}" placeholder="Enter ..." ></input>
            <div class="input-group">
                <span class=" invalid" role="dialog"><strong class="estado text-danger fs-6 fst-italic"> </strong></span>
            </div>
            @error('estado')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Nacionalidad</label>
            <input type="text" class="form-control @error('nacionalidad') is-invalid @enderror" autocapitalize="sentences" name="nacionalidad"  @isset($user_date)  value="{{$user_date->nacionalidad}}" @endisset value="{{ old('nacionalidad') }}" placeholder="Enter ..."></input>
            <div class="input-group">
                <span class=" invalid" role="dialog"><strong class="nacionalidad text-danger fs-6 fst-italic"> </strong></span>
            </div>
            @error('nacionalidad')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <!-- select -->
        <div class="form-group">
            <label>Estado Civil</label>
            <select class="form-control @error('estado_civil') is-invalid @enderror" name="estado_civil">
                @if(isset($user_date))
                @else 
                <option value="" selected>-Seleciona una opcion-</option>
                @endif
                <option value="casado" @if(isset($user_date) && ($user_date->estado_civil=='Casado')) selected @endif>Casado</option>
                <option value="soltero" @if(isset($user_date) && ($user_date->estado_civil=='Soltero')) selected @endif>Soltero</option>
                <option value="viudo" @if(isset($user_date) && ($user_date->estado_civil=='Viudo')) selected @endif>Viudo</option>
                <option value="divorciado"@if(isset($user_date) && ($user_date->estado_civil=='Divorciado')) selected @endif>Divorciado</option>
            </select>
            <div class="input-group">
                <span class=" invalid" role="dialog"><strong class="estado_civil text-danger fs-6 fst-italic"> </strong></span>
            </div>
            @error('estado_civil')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    @isset($iglesias)
    @if (empty($esMiembro)== true)
     
    <div class="col-sm-6">
        <div class="form-group">
            <label for="chec">Registrar la iglesia a la que pertenece</label>
           
            <div  class="input-group  col-auto">
                <select id="iglesia" class="form-control @error('iglesia') is-invalid @enderror" name="iglesia">
                    <option selected value=null >-Seleciona un Opción</option>
                    
                    @foreach($iglesias as  $iglesia)
                    <option value="{{$iglesia->id}}" >  {{$iglesia->name}} </option>>
                    @endforeach
                </select>
                <div class="input-group-append">
                    @error('iglesia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    @endif
        
    @endisset
    
</div>
<br>

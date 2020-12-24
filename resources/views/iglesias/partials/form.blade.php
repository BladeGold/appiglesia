<div class="form-group">
    <label>Nombre de la Iglesia:</label>
    <div class="input-group">
        <input type="text"  class="form-control" name="name" @if(isset($iglesia)) value=" {{$iglesia->name}}" @else value="{{ old('name') }}" @endif required>
    </div>
    <!-- /.input group -->
</div>
<div class="form-group">
    <label>Dirección de la Iglesia:</label>
    <div class="input-group">
        <input type="text" class="form-control" name="direccion" @if(isset($iglesia)) value=" {{$iglesia->direccion}}" @else value="{{ old('name') }}" @endif required>
    </div>
    <!-- /.input group -->
</div>

<hr>


<div class="form-group">                                    
    @if(isset($asig))
        <label for="chec">Pastor de la iglesia @if(isset($iglesia)){{ $iglesia->name}} @endif </label>
        <div  class="input-group  col-auto">
            <select id="regiglesia"  class="form-control @error('iglesia') is-invalid @enderror" name="pastor">
    @else
        <label for="chec">Asignar el Pastor de esta iglesia?</label>
        <input type="checkbox" id="checkiglesia" onChange="iglesiareg(this);" > <b>Si</b>
        <div  class="input-group  col-auto">
            <select id="regiglesia" disabled  class="form-control @error('iglesia') is-invalid @enderror" name="pastor">
                <option selected value="null">-Selecciona una Opción- </option>
    @endif                                    
                @if((isset($asig)) && ($asig==$pastor->id))
                    <option value="{{$pastor->id}}"  selected>{{$pastor->name }} {{$pastor->last_name}}</option>
                @endif
                @isset($pastores)
                    @foreach($pastores as  $pastor)
                        <option value="{{$pastor->id}}">{{$pastor->name }} {{$pastor->last_name}}</option>
                    @endforeach
                @endisset                                                                                        
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
<div class="form-group">
    <button type="reset" class="btn btn-secondary">Limpiar</button>
    <button type="submit" class="btn btn-primary"> Guardar </button>
</div>
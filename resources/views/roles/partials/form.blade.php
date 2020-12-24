<div class="container" style="padding-right:5%;  padding-left: 5%; padding-top: 2%">
    <div class="row-cols-1">
        <div class="card card-primary">
            <div class="card-header">
                
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nombre del rol</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" @if(isset($role)) value="{{$role->name}}" @endif>
                    </div>
                </div>
                <div class="form-group">
                    <label> URL amigable del rol</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="slug" @if(isset($role)) value="{{$role->slug}}" @endif> 
                    </div>
                    
                </div>
                <div class="form-group">
                    <label>Descripción del rol</label>
                    <div class="input-group">
                        <input type="textarea" class="form-control" name="description" @if(isset($role)) value="{{$role->description ?? 'Sin Descripción'}}" @endif> 
                    </div>
                </div>

                <hr>
                <h3>Permiso especial</h3>
                <div class="form-group">
                    <input type="radio"  name="special" value="all-access" @if((isset($role)) && ($role->special=='all-access')) checked=checked @endif>
                    <label for="all-access">Acceso total</label><br>
                    <input type="radio" name="special" value="no-access" @if((isset($role)) && ($role->special=='no-access')) checked=checked @endif >
                    <label for="no-access">Ningún Acceso</label><br>
                    <input type="radio" name="special" value="" @if((isset($role)) && ($role->special==null)) checked=checked @endif >
                    <label for="no-access">Sin permiso especial</label><br>
                </div>
                <hr>
                <h3>Lista de permisos</h3>
                <div class="form-group">
                    <ul class="list-unstyled">
                        @foreach($permissions as $permission)
                        <li>
                            <label>
                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}" @if((isset($role)) and ($role->permissions->contains($permission->id))) checked=checked @endif>
                            {{ $permission->name }}
                            <em>({{ $permission->description }})</em>
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Guardar </button>
                </div>
            </div>
        </div>
    </div>
</div>
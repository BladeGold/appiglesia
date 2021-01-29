
<a @if(isset($finanza)) href="{{ route('finanzas.edit',  $finanza->id) }}" @endif>
    <button type="button" class="btn btn-sm btn-primary "><i class="far fa-edit"></i></button>
</a>
@can('admin') 
<button type="button"  class="btn btn-sm btn-danger btn-delete"><i class="far fa-trash-alt"></i></button>
<form action="{{route('finanzas.destroy', ':FINANZA-ID')}}"  method="POST" id="form-delete"> 
    @csrf
    @method('DELETE') 
    
</form>
@endcan
   
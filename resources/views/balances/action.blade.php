
  
@can('admin') 
<button type="button"  class="btn btn-sm btn-danger btn-delete"><i class="far fa-trash-alt"></i></button>
<form action="{{route('balances.destroy', ':BALANCE-ID')}}"  method="POST" id="form-delete"> 
    @csrf
    @method('DELETE') 
    
</form>
@endcan
   
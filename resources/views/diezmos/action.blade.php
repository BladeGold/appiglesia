
<button type="button" class="btn btn-sm btn-primary " data-id="{{$id}}" id="edit" data-toggle="modal" data-target="#edit"><i class="far fa-edit"></i></button>
  
@can('admin') 
<button type="button" data-id="{{$id}}" class="btn btn-sm btn-danger btn-delete"><i class="far fa-trash-alt"></i></button>
<form action="{{route('diezmos.destroy', ':DIEZMO-ID')}}"  method="POST" id="form-delete"> 
    @csrf
    @method('DELETE') 
    
</form>
@endcan
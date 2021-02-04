
   @isset($user->Datos)
    <a href="{{ route('users.show', ['users', $user->id]) }}">
        <button type="button" class="btn btn-sm btn-secondary "><i class="far fa-eye"></i></button>
    </a>
    @endisset
    <a href="{{ route('admin.edit', ['users', $user->id]) }}">
        <button type="button" class="btn btn-sm btn-primary "><i class="far fa-edit"></i></button>
    </a>
    <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="far fa-trash-alt"></i></button>
    <form action="{{ route('users.destroy', ':USER-ID') }}"  method="POST" class="form-delete"> 
    @csrf
    @method('DELETE')
    
</form>





    <a href="{{ route('admin.show', ['iglesias', $iglesia->id ]) }}">
        <button type="button" class="btn btn-secondary btn-sm"><i class="far fa-eye"></i></button>
    </a>
    <a href="{{ route('iglesias.edit', $iglesia->id) }}">
        <button type="button" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></button>
    </a>
    <button type="button" class="btn btn-sm btn-danger btn-delete"><i class="far fa-trash-alt"></i></button>
    <form action="{{ route('iglesias.destroy', ':IGLESIA-ID') }}" method="POST" id="form-delete">    
    @csrf
    @method('DELETE')
    
</form>



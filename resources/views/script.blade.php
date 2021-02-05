<script>
  

    function comprobar(e) {
        if (document.getElementById("check").checked == true){
            document.getElementById('imagen').removeAttribute("disabled");
            document.getElementById('imagenPreview').innerHTML = '';
            document.getElementById('imagenPreview').style.display = "";
        }

        if(document.getElementById("check").checked == false){
            document.getElementById('imagen').value=null;
            document.getElementById('imagenPreview').style.display = "none";
            document.getElementById('imagen').disabled = true;
        }
    }

    function filePreview(input){
        if (input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#imagenPreview').html("<img width='250' height='250'\ src='"
                    +e.target.result+
                    "'  class=\"img-circle img-bordered\"  />");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#imagen').change(function(){
        filePreview(this);
    });




@if ($errors->any())

        $(document).ready(function()
        {
            $("#mensajeModal").modal("show");
        });

@endif


    function iglesiareg(e) {
        if (document.getElementById("checkiglesia").checked == true){
            document.getElementById('regiglesia').removeAttribute("disabled");

        }

        if(document.getElementById("checkiglesia").checked == false){
            document.getElementById('regiglesia').value=null;
            document.getElementById('regiglesia').disabled = true;
        }
    }
    
@auth()
    $(document).ready(function(){
        
        $('#ver tbody').on('click','#edit', function(){
            var id = $(this).data('id');
            
            var url= "{{ route('diezmos.index') }}" +'/' + id +'/edit';
        
            $.get(url, function (data) {
                        
                        $('input[name=id]').val(id);
                        $('input[name=fecha]').val(data.fecha);
                        $('input[name=monto]').val(data.monto);
                        $('input[name=referencia]').val(data.referencia);
                    });            
        });

        $('#ver tbody').on('click','.btn-delete', function(){
                
                var id = $(this).data('id');
                var form= $('#form-delete');
                var url= form.attr('action').replace(':DIEZMO-ID', id);
                var datos= form.serialize();
                $('#cerrarDiezmo').click();
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                
            Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Una vez eliminado, no se podra recuperar la informacion! ",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: `Si`,
                   
                }) .then((result)=>{
                    if(result.isConfirmed){
                        $.post(url,datos, function(result){
                            
                            Swal.fire({
                                title: result.title,
                                icon: result.icon,
                                button: true,
                            })
                        });
                    }else{
                        Swal.fire("¡Acción cancelada");
                    }

                });
        });

        $('#actualizar').click(function(){
            
            var form= $('#editDiezmoForm');
            var data = form.serializeArray();
            var id = data[1].value
            var url= form.attr('action').replace(':DIEZMO-ID', id);
            $.ajax({
                url: url,
                data: data,
                type:"PUT",
                headers: {
                    'X-CSRF-Token': $('input[name=_token]').attr('value'), 
                         },
                success: function(result){
                    $('#cerrarEdit').click();
                    $('#cerrarDiezmo').click();
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    Swal.fire({
                        title : result.title,
                        icon: result.icon,
                    
                     });
                },
                error: function(error){
                    var errors = error.responseJSON.errors;
                    $(':input').removeClass('is-invalid');
                    if(!errors.hasOwnProperty('fecha')){
                        
                        $('.fecha').html(' ');
                    }
                    if(!errors.hasOwnProperty('monto')){
                        
                        $('.monto').html(' ');
                    }
                    if(!errors.hasOwnProperty('referencia')){
                        
                        $('.referencia').html(' ');
                    }
                  
                    for(var i in errors){
                    if(errors.hasOwnProperty(i)){
                        $(`input[name=${[i]}]`).addClass('is-invalid')
                        $(`.${i}`).html(`${errors[i]}`);
                        
                    }
                }
                },                
            });
            
        });
 

        $('#verDiezmo').click(function(){
            var url = "{{route('diezmos.show', auth::user()->id)}}";
            if ( $.fn.dataTable.isDataTable( '#showDiezmo' ) ) {
                $('#showDiezmo').DataTable().ajax.reload();
            }
            else {
                $('#showDiezmo').dataTable({
                    language: {
                        search: "Buscar:",
                        lengthMenu: "Muestra _MENU_ registros por página",
                        zeroRecords: "No se encontraron datos",
                        infoEmpty: "No hay datos para mostrar",
                        info: "Mostrando del _START_ al _END_, de un total de _TOTAL_ entradas",
                        paginate: {
                            first: "Primeros",
                            last: "Ultimos",
                            next: "Siguiente",
                            previous: "Anterior"
                        },
                    },
                            ajax:{
                            url: url,
                            type: "POST",
                            headers: {
                                'X-CSRF-Token': $('input[name=_token]').attr('value'), 
                                        },
                        },
                        columns:[
                            
                            {data: 'id', name:"id"},
                            {data: 'fecha', name:"fecha"},
                            {data:'monto', name: "monto"},
                            {data: 'referencia', name: "referencia"},
                            {data: 'action', name: 'action', ordeable:false, searchable:false},
                    ],
                });
             }
            
           
        }); 

        //Fin de Ver
        
        
        $('#registrar').click(function(){
            var form = $('#registraDiezmoForm');
            var url= form.attr('action');
            var type = form.attr('method');
            var data = form.serializeArray();
            var i;
            $.ajax({
                url: url,
                data: data,
                type: type,
                headers: {
                          'X-CSRF-Token': $('input[name=_token]').attr('value'), 
                                 },
                success: function(result){
                $('#fecha').val('');
                $('#monto').val('');
                $('#referencia').val('');
                $('#cerrar').click();
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                
               
                Swal.fire({
                    title : result.title,
                    icon: result.icon,
                });
                },
                error: function(error){
                    
                    var errors = error.responseJSON.errors;
                    $(':input').removeClass('is-invalid');
                    if(!errors.hasOwnProperty('fecha')){
                        
                        $('.fecha').html(' ');
                    }
                    if(!errors.hasOwnProperty('monto')){
                        
                        $('.monto').html(' ');
                    }
                    if(!errors.hasOwnProperty('referencia')){
                        
                        $('.referencia').html(' ');
                    }
                  
                    for(var i in errors){
                    if(errors.hasOwnProperty(i)){
                        $(`input[name=${[i]}]`).addClass('is-invalid')
                        $(`.${i}`).html(`${errors[i]}`);
                        
                    }
                }

                },

            });
        });
@endauth
        //Fin de registrar

       
        
    });

    
    
    

</script>




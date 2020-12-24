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
            $("#miModal").modal("show");
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

    

    function tipo_finanza(id) {
        if(id == "activo"){
            document.getElementById("activo").removeAttribute("hidden");
            document.getElementById("fecha_activo").disabled=false;
           document.getElementById("monto_activo").disabled=false;
           document.getElementById("pasivo").hidden=true;
           document.getElementById("fecha_pasivo").disabled=true;
           document.getElementById("monto_pasivo").disabled=true;
           document.getElementById("boton").removeAttribute("hidden");
        }
        if(id == "pasivo"){
            document.getElementById("pasivo").removeAttribute("hidden");
            document.getElementById("fecha_pasivo").disabled=false;
           document.getElementById("monto_pasivo").disabled=false;
            document.getElementById("activo").hidden=true;
            document.getElementById("fecha_activo").disabled=true;
           document.getElementById("monto_activo").disabled=true;
            document.getElementById("boton").removeAttribute("hidden");
        }
        if(id== "ambos"){
            document.getElementById("activo").removeAttribute("hidden");
            document.getElementById("pasivo").removeAttribute("hidden");
            document.getElementById("boton").removeAttribute("hidden");
            document.getElementById("fecha_pasivo").disabled=false;
           document.getElementById("monto_pasivo").disabled=false;
           document.getElementById("fecha_activo").disabled=false;
           document.getElementById("monto_activo").disabled=false;
        }
        if(id == "select"){
            document.getElementById("activo").hidden= true;
            document.getElementById("fecha_activo").disabled=true;
           document.getElementById("monto_activo").disabled=true;
            document.getElementById("pasivo").hidden= true;
            document.getElementById("fecha_pasivo").disabled=true;
           document.getElementById("monto_pasivo").disabled=true;
            document.getElementById("boton").hidden = true;
        }
    }
    
    
$(document).ready(function()
{
    $("#miModalIglesia").modal("show");
});
</script>




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

    

    
    
    
$(document).ready(function()
{
    $("#miModalIglesia").modal("show");
});
</script>




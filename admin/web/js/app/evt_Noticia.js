// JavaScript Document
$(function() {
    $( "#save" ).click(function()
    {
        bval = true;
        bval = bval && $( "#titulo" ).required();
        bval = bval && $( "#fechapubli" ).required();
        bval = bval && $( "#fechainicio" ).required();
		bval = bval && $( "#horapublicacion" ).required();
		bval = bval && $( "#nombre" ).required();
        bval = bval && $( "#idtiponoticia" ).required();
		if($("#idtiponoticia").val()==9){}
		else{
		    if($("#archivo").val()=="" && $("#imagen").val()==""){bval = bval && $( "#archivo" ).required();}
		}
        bval = bval && $( "#procedencia" ).required();
		<!--bval = bval && $( "#descripcion" ).required();-->
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });

    $( "#delete" ).click(function(){
          if(confirm("Confirmar Eliminacion de Registro"))
              {
                  $("#frm").submit();
              }
    });
});
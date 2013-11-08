$(function() {
    $( "#save" ).click(function()
    {
    bval = true;
    bval = bval && $( "#descripcion" ).required();
		//bval = bval && $( "#idtipousuario" ).required();
		//bval = bval && $( "#lugar" ).required();
		//bval = bval && $( "#fsalida" ).required();
		//bval = bval && $( "#hsalida" ).required();
		//bval = bval && $( "#email" ).required();
		//bval = bval && $( "#fecharegistro" ).required();
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

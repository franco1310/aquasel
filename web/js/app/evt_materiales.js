// JavaScript Document
// JavaScript Document
$(function() {
    $( "#save" ).click(function()
    {
    bval = true;
    bval = bval && $( "#descripcion" ).required();
		bval = bval && $( "#marca" ).required();
		bval = bval && $( "#modelos" ).required();
    bval = bval && $( "#stock" ).required();
    bval = bval && $( "#stockm" ).required();
    bval = bval && $( "#idm" ).required();
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


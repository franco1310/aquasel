// JavaScript Document
// JavaScript Document
$(function() {
    $( "#save" ).click(function()
    {
        bval = true;
        bval = bval && $( "#pdf" ).required();
		bval = bval && $( "#descripcion" ).required();
		bval = bval && $( "#cantidad" ).required();
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


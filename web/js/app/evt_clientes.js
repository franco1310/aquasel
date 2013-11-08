/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {
    $( "#save" ).click(function()
    {
        bval = true;
        bval = bval && $( "#nombre_razon" ).required();
        bval = bval && $( "#dni_ruc" ).required();
        bval = bval && $( "#direccion" ).required();
        bval = bval && $( "#telefono" ).required();
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


/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(function() {
    $( "#save" ).click(function()
    {
        bval = true;
        bval = bval && $( "#nombre" ).required();
        /*bval = bval && $( "#appat" ).required();
        bval = bval && $( "#apmat" ).required();
        bval = bval && $( "#direccion" ).required();
        bval = bval && $( "#telefono" ).required();
        bval = bval && $( "#edad" ).required();
        bval = bval && $( "#correo" ).required();*/
        bval = bval && $( "#login" ).required();
		bval = bval && $( "#contrasena" ).required();
		bval = bval && $( "#idtipousuario" ).required();
		bval = bval && $( "#dni" ).required();
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

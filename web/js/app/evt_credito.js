// JavaScript Document
// JavaScript Document
$(function() {
    $( "#save" ).click(function()
    {
    bval = true;
    bval = bval && $( "#nombre_razon" ).required();
    
    
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });

    $( ".anula" ).click(function(){
          if(confirm("Confirma Anular Salida"))
              {

              var idc=$(this).attr("id");
              $.get('index.php?controller=credito&action=anular&id='+idc,function(data){
              window.location='index.php?controller=credito';
            });

              }
    });
});


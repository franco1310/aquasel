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
          if(confirm("Confirma Anular compra"))
              {

              var idc=$(this).attr("id");
              $.get('index.php?controller=contado&action=anular&id='+idc,function(data){
              window.location='index.php?controller=contado';
            });

              }
    });
});


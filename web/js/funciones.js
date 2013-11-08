$(document).ready(function(){

//autocomplete
$("#descripcion").autocomplete({ 
            source: "index.php?controller=materiales&action=lista",
            focus: function( event, ui ) {
                $( "#descripcion" ).val( ui.item.mat );

                return false;
            },
            select: function( event, ui ) {
                $( "#descripcion" ).val( ui.item.mat );
                $( "#idmat" ).val( ui.item.idmat );
                $( "#medida" ).val( ui.item.med );
                
                return false;
            }
        }).data("autocomplete")._renderItem=function(ul,item)
            {
                return $("<li></li>")
                        .data("item.autocomplete",item)
                        .append("<a>"+item.mat+"</a>") //enviar mas parametros
                        .appendTo(ul);
            };



$("#nombre_razon").autocomplete({ 
            source: "index.php?controller=clientes&action=lista",
            focus: function( event, ui ) {
                $( "#nombre_razon" ).val( ui.item.name );

                return false;
            },
            select: function( event, ui ) {
                $( "#nombre_razon" ).val( ui.item.name );
                $( "#idc" ).val( ui.item.id );

                return false;
            }
        }).data("autocomplete")._renderItem=function(ul,item)
            {
                return $("<li></li>")
                        .data("item.autocomplete",item)
                        .append("<a>"+item.name+"</a>") //enviar mas parametros
                        .appendTo(ul);
            };

//*************************************

});

item=0;
p=0
function fn_add(p)
{
 
 if(fn_validate()==true){

    var idmat=$("#idmat").val();
    var f=$("#fechamov").val();
    //var idm=$("#idm").val();
    var cantidad=$("#cantidad").val();
    var precio=$("#precio").val();
    item=item+1;
	cadena="<tr align='center'>";
	cadena=cadena+"<td>"+item+"</td>";
	cadena=cadena+"<td><input type='hidden' name='material[]' value='"+idmat+"'>"+$("#descripcion").val()+"</td>";
	cadena=cadena+"<td><input type='hidden' name='fecha[]' value='"+f+"'>"+$("#fechamov").val()+"</td>";
    cadena=cadena+"<td><input type='hidden' name='cant[]' value='"+cantidad+"'>"+$("#cantidad").val()+"</td>";
	if(p==5){
  
  cadena=cadena+"<td><input type='hidden' name='price[]' value='"+precio+"'>"+$("#precio").val()+"</td>";
	cadena=cadena+"<td id='st'>"+$("#cantidad").val()*$("#precio").val()+"</td>";
	}

  cadena=cadena + "<td><a class='elimina'><img src='images/minus.png' width='16' height='16' style='cursor:pointer' /></a></td><tr>";

    $("#grilla tbody").append(cadena);
     fn_total();
     fn_rm();
     fn_clean();



     }


    



}
function fn_total()
{
    var st=0;
    //alert(st);
    $("#grilla").find("tbody tr").not(':last').each(function(){

        t = $(this).find('td:eq(5)').html();
        if(t != null)
            st +=parseFloat(t);
         
    });
    $("#grilla").find("tfoot tr td:eq(5)").empty().append(st.toFixed(2));
}

 function fn_rm(){
                $("a.elimina").click(function(){
                    id = $(this).parents("tr").find("td").eq(1).html();
                    respuesta = confirm("DESEA QUITAR  MATERIAL: " + id);
                    if (respuesta){
                        $(this).parents("tr").fadeOut("normal", function(){
                            $(this).remove();
                            alert("MATERIAL " + id + " QUITADO")
                            fn_total();
                            /*
                                aqui puedes enviar un conjunto de datos por ajax
                                $.post("eliminar.php", {ide_usu: id})
                            */
                        })
                    }
                });
            };
function fn_validate()
{
  bval = true;
  bval = bval && $( "#descripcion" ).required();
  //bval = bval && $( "#idm" ).required();
  bval = bval && $( "#cantidad" ).required();
  bval = bval && $( "#precio" ).required();
  return bval;
}
function fn_clean()
{

//$("#descripcion").val("");
//$("#medida").val("");
$("#cantidad").val("");
$("#precio").val("");

} 
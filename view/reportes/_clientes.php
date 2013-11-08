<script type="text/javascript">
    $(document).ready(function(){
        
        $("#gen").click(function(){      
            if(valid())
                {
                    var str = $("#frm").serialize();

                    $.get('index.php','controller=reportes&action=html_clientes&'+str,function(data){
                        $("#wcont").empty().append(data);
                    });
                }
        });
        $("#pdf").click(function(){
            if(valid())
                {
                    var str = $("#frm").serialize();
                    window.open('index.php?controller=reportes&action=pdf_clientes&'+str,"Reporte");
                }
        });
    });
    function valid()
    {
        var bval = true;
            //bval = bval && $("#idarticulo").required();
        return bval;
    }
</script>
<div class="div_container">

	<h6 class="ui-widget-header">Reporte de Clientes por Zona</h6>
<div style="padding: 20px; background: #EBECEC">
    
    <form name="frm" id="frm" action="" method="get">
        
        
        <label class="labels" for="idz" style="margin-left:185px">Zona: </label>
        <?php echo $zona;?>
     
    </form>

    <div  style="clear: both; padding: 5px; width: auto;text-align: center">
        <a href="index.php" class="button">CERRAR</a>
        <a href="#" id="gen" class="button">GENERAR</a>
        <a href="#" id="pdf" class="button">VISTA PREVIA</a>
    </div>
</div>
<div id="wcont" style="padding: 10px;"></div>

</div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>DIARIO HOY</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="expires" content="0" />
    <link type="text/css" href="css/jquery-ui-1.8.1.custom.css" rel="stylesheet" />
    <link type="text/css" href="css/layout.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.10.custom.min.js"></script>
    <script type="text/javascript" src="js/utiles.js"></script>
    <script type="text/javascript" src="js/required.js"></script>
    <script type="text/javascript" src="js/session.js"></script>
    <script type="text/javascript" src="js/menus.js"></script>
    <link href="css/stilos_menu.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript">
   $(document).ready(function() {
        $.get('index.php','controller=Index&action=Menu',function(menu){                            
            $("#menu-sistema").empty();
                var opciones_menu = menu;
                $("#menu-sistema").generaMenu(opciones_menu);},'json');
    });
 </script>
<body>
      
      <div id="menu-top">
           <div class="wrapper-login">
            
            <ul class="item-top">
                <li>
                    <img src="../web/images/adminm.png" width="24" height="24"> 
                    <?php // echo $_SESSION['name']." | ".$_SESSION['tipo']; ?>
                </li>
                <li>
                    <a href="#">Perfil: <?php echo $_SESSION['perfil']; ?></a>
                </li>
                <li>
                  
                
                <!-- <a href="index.php?controller=usuario&action=logout">Login</a>  -->
                <table border='0'>
                 <tr>
                   <td><img src="../web/images/calendar.png" style='margin-top:9px;'></td>
                   <td>FECHA: <?php echo date('d/m/Y') ?></td>
                 </tr>
                </table>
            



                    
                </li>
            </ul>

            <div style="float:right;margin-right:-140px">
                
                <table border='0'>
                 <tr>
                   <td><img src="../web/images/login.png" style='margin-top:9px;'></td>
                   <td><a href="index.php?controller=usuario&action=logout">Login</a>Cerrar sesion</a></td>
                 </tr>
                </table>
                
                
            </div>
        </div>
    </div>
	  
	  
	  <div id="header">
           <h3></h3>
            
            <!--
            Menu dinámico .
            -->
            <div id="menu" >
                <div id="loader_menu" class="loader_menu">
                   
                </div>
            </div>
        </div>
		
		
  
  
    <div id="body">
        <!--
        Cabecera - Banner .
        -->
    
        <div class="spacer"></div>
        <!--
        Espacio de trabajo midcolumn.
        -->
        <div id="content">
            <div id="menu-sistema" ></div>
            <div class="text-login" style="width: 100%; background:#E1B267; font-size: 11px; font-weight: bold; padding-bottom: 6px; padding-top: 6px; color:#000; text-align: center; font-family: arial; border-bottom: 1px solid #57962B;">
                --
            </div>
            <?php echo $content; ?>
        </div>
        <div  class="spacer"></div>
    </div>
    <!--
    Pie de pagina.
    -->
    <!--<div id="foot_foot">
        <div id="foot">
            
        </div>
    </div>-->
    <!--
    Diálogo mostrado al expirar la sesión.
    -->
    <div id="dialog-session" title="Su sesión ha expirado." style="display:none">
        <div class="ui-state-error" style="padding: 0 .7em; border: 0">
            <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
            <strong>Por favor vuelva a iniciar sesión.</strong></p>
        </div>
    </div>
    <div id="dialog">
       <p id="msgdialog" ></p>
    </div>
</body>
</html>
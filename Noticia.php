<?php
include_once("Main.php");
include_once("../lib/class.upload.php");

class Noticia extends Main
{
   function index($query , $p ) {
        $sql = "SELECT noticia.idnoticia,noticia.titulo, noticia.descripcion, 
		               noticia.fechapubli,concat(usuario.nombre,' ',usuario.appat,' ',usuario.apmat)
                FROM noticia
                     INNER JOIN tiponoticia ON tiponoticia.idtiponoticia = noticia.idtiponoticia
                     INNER JOIN usuario ON usuario.idusuario = noticia.idusuario


		   	   where noticia.titulo like :query order by fechapubli desc";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT noticia.*,concat(usuario.nombre,' ', usuario.appat,' ',usuario.apmat) as nombre FROM noticia inner join usuario on noticia.idusuario=usuario.idusuario WHERE idnoticia = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
	
function insert($_P ) {
		
$name_foto="images".date('ymdms');
$extension=$_FILES['archivo']['type'];
$ext=strpos($extension,"wmv");

$fo = new Upload($_FILES['archivo']);

   if(strpos($extension,"wmv")){
	   if ($fo->uploaded){
		$fo->file_new_name_body = $name_foto;
		$fo->Process('videos/');
		if($fo->processed){$subio=true;$fo->Clean();}
		else{$subio=false;}
	   }
	   $archivo=$name_foto;
	   
	   }
   else{
	if ($fo->uploaded){
		$fo->file_new_name_body = $name_foto;
		$fo->image_resize = true; // autoriza que si se redimensione
        $fo->image_convert = jpg; // formato a convertir
		$fo->Process('imagenes/');
		if($fo->processed){$subio=true;$fo->Clean();}
		else{$subio=false;}
		}
	 $archivo="imagenes/".$name_foto.".jpg";
   }
		
		if($subio==true){
		
       $stmt = $this->db->prepare("insert into noticia
	(titulo,descripcion,fechapubli,idtiponoticia,archivo,idusuario,estado,idprocedencia,horapublicacion)values(:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9)");
        $stmt->bindValue(':p1', $_P['titulo'] , PDO::PARAM_STR);
		$stmt->bindValue(':p2', $_P['descripcion'] , PDO::PARAM_STR);
		$stmt->bindValue(':p3', $_P['fechapubli'] , PDO::PARAM_STR);
		$stmt->bindValue(':p4', $_P['idtiponoticia'] , PDO::PARAM_INT);
		$stmt->bindValue(':p5', $archivo , PDO::PARAM_STR);
		$stmt->bindValue(':p6', $_P['idusuario'] , PDO::PARAM_INT);
		$stmt->bindValue(':p7', $_P['activo'] , PDO::PARAM_INT);
        $stmt->bindValue(':p8', $_P['idprocedencia'] , PDO::PARAM_INT);
	    $stmt->bindValue(':p9', $_P['horapublicacion'] , PDO::PARAM_STR);
		
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);

		}else{echo 'Error al subir la imagen'. $fo->error;}
    }
function update($_P )
    {
	$name_foto="images".date('ymdms');
	$extension=$_FILES['archivo']['type'];
	$ext=strpos($extension,"wmv");
	if($_POST['archivo']==""){$subir=$_POST['imagen'];}
	else{
		 $fo = new Upload($_FILES['archivo']);
	         if ($fo->uploaded){
		         $fo->file_new_name_body = $name_foto;
		         $fo->image_resize = true; // autoriza que si se redimensione
                 $fo->image_convert = jpg; // formato a convertir
		         $fo->Process('imagenes/');
		         if($fo->processed){$subio=true;$fo->Clean();}
		         else{$subio=false;}
		       }
	 $subir="imagenes/".$name_foto.".jpg";
	    }
		
		if($subio==true){}else{echo 'Error al subir la imagen'. $fo->error;}
        $stmt = $this->db->prepare("update noticia set titulo=:p1,descripcion=:p2,fechapubli=:p3,
				    idtiponoticia=:p4,archivo=:p5,idusuario=:p6,estado=:p7,idprocedencia=:p8,horapublicacion=:p9 where idnoticia=:p0");
        $stmt->bindValue(':p1', $_P['titulo'] , PDO::PARAM_STR);
		$stmt->bindValue(':p2', $_P['descripcion'] , PDO::PARAM_STR);
		$stmt->bindValue(':p3', $_P['fechapubli'] , PDO::PARAM_STR);
		$stmt->bindValue(':p4', $_P['idtiponoticia'] , PDO::PARAM_INT);
		$stmt->bindValue(':p5', $subir , PDO::PARAM_STR);
		$stmt->bindValue(':p6', $_P['idusuario'] , PDO::PARAM_INT);
		$stmt->bindValue(':p0', $_P['idnoticia'] , PDO::PARAM_INT);
        $stmt->bindValue(':p7', $_P['activo'] , PDO::PARAM_INT);
        $stmt->bindValue(':p8', $_P['idprocedencia'] , PDO::PARAM_INT);
		$stmt->bindValue(':p9', $_P['hora'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
		
     }
     function delete($_P ) {
        $stmt = $this->db->prepare("DELETE FROM noticia WHERE idnoticia = :p1");
        $stmt->bindValue(':p1', $_P['idnoticia'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
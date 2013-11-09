<?php
include_once("Main.php");
class usuario extends Main
{
     function Start() {
       $statement = $this->db->prepare("SELECT usuario.idusuario AS id,
                                               (CONCAT( usuario.nombre, ' ',
                                                         usuario.appat,  ' ', 
                                                         usuario.apmat )) AS nombre, 
                                                usuario.login AS login, 
                                                tipousuario.descripcion AS tipo,
                                                usuario.idtipousuario AS idtipo,
                                                usuario.sexo as sexo

                                        FROM usuario
                                        INNER JOIN tipousuario ON usuario.idtipousuario = tipousuario.idtipousuario
							            WHERE usuario.login = :login AND usuario.contrasena = :contrasena");
        $statement->bindParam (":login", $_POST['login'] , PDO::PARAM_STR);
        $statement->bindParam (":contrasena", $_POST['contrasena'] , PDO::PARAM_STR);
        $statement->execute();
        $obj = $statement->fetchObject();
        //var_dump($obj);die();
        return array('flag'=>$statement->rowCount() , 'obj'=>$obj );
    }
    


   function index($query , $p ) 
   {
        $sql = "select usuario.idusuario,concat(usuario.nombre,' ',usuario.appat,' ',usuario.apmat),
                       usuario.dni,tipousuario.descripcion
                from usuario inner join tipousuario on usuario.idtipousuario = tipousuario.idtipousuario
                where (concat(usuario.nombre,' ',usuario.appat,' ',usuario.apmat)) like :query";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }
    
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE idusuario = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    
    function insert($_P ) 
    {
       $stmt = $this->db->prepare("insert into usuario (nombre,appat,apmat,direccion,telefono,edad,correo,login,contrasena,idtipousuario,dni,sexo) 
                                    values(:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12)");
        $stmt->bindValue(':p1', $_P['nombre'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['appat'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['apmat'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['direccion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['telefono'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['edad'] , PDO::PARAM_INT);
        $stmt->bindValue(':p7', $_P['correo'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['login'] , PDO::PARAM_STR);
        $stmt->bindValue(':p9', $_P['contrasena'] , PDO::PARAM_STR);
        $stmt->bindValue(':p10',$_P['idtipousuario'] , PDO::PARAM_INT);
		$stmt->bindValue(':p11',$_P['dni'] , PDO::PARAM_STR);
        $stmt->bindValue(':p12',$_P['sexo'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    function update($_P )
    {
        $stmt = $this->db->prepare("update usuario set nombre=:p1,appat=:p2,apmat=:p3,direccion=:p4,
                                    telefono=:p5,edad=:p6,correo=:p7,login=:p8,contrasena=:p9,idtipousuario=:p10,dni=:p11,sexo=:p12
									 where idusuario=:p0");
        $stmt->bindValue(':p1', $_P['nombre'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['appat'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['apmat'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['direccion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['telefono'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['edad'] , PDO::PARAM_INT);
        $stmt->bindValue(':p7', $_P['correo'] , PDO::PARAM_STR);
		$stmt->bindValue(':p8', $_P['login'] , PDO::PARAM_STR);
        $stmt->bindValue(':p9', $_P['contrasena'] , PDO::PARAM_STR);
        $stmt->bindValue(':p10',$_P['idtipousuario'] , PDO::PARAM_INT);
		$stmt->bindValue(':p11',$_P['dni'] , PDO::PARAM_STR);
        $stmt->bindValue(':p12',$_P['sexo'] , PDO::PARAM_INT);
        $stmt->bindValue(':p0', $_P['idusuario'], PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
     }
     
     function delete($_P ) 
     {
        $stmt = $this->db->prepare("DELETE FROM usuario WHERE idusuario = :p1");
        $stmt->bindValue(':p1', $_P['idusuario'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
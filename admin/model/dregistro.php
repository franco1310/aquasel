<?php
include_once("Main.php");
class dregistro extends Main
{
   function index($query , $p ) {
        $sql = "select dregistro.idr,
                       materiales.descripcion,
                       dregistro.lugar,
                       (concat(usuario.nombre, ' ',usuario.appat, ' ',usuario.apmat)) as usuario,
                       dregistro.fsalida,
                       dregistro.fretorno,
                       dregistro.hsalida,
                       dregistro.hretorno,
                       (CASE dregistro.estado WHEN 1 THEN 'ENTREGADO'
                                              WHEN 0 THEN 'RETIRADO'
                       END) as estado
                from dregistro
                     inner join materiales on materiales.idm=dregistro.idm
                     inner join usuario on usuario.idusuario=dregistro.idusuario
                where fsalida like :query order by dregistro.fsalida desc";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM dregistro WHERE idr = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
       $stmt = $this->db->prepare("insert into dregistro (idm,idusuario,lugar,fsalida,fretorno,hsalida,hretorno,estado) values(:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8)");
        $stmt->bindValue(':p1', $_P['idm'] , PDO::PARAM_INT);
		$stmt->bindValue(':p2', $_P['idusuario'] , PDO::PARAM_INT);
		$stmt->bindValue(':p3', $_P['lugar'] , PDO::PARAM_STR);
		$stmt->bindValue(':p4', $_P['fsalida'] , PDO::PARAM_STR);
		$stmt->bindValue(':p5', $_P['fretorno'] , PDO::PARAM_STR);
		$stmt->bindValue(':p6', $_P['hsalida'] , PDO::PARAM_STR);
		$stmt->bindValue(':p7', $_P['hretorno'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['activo'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P )
    {
        $stmt = $this->db->prepare("update dregistro set idm=:p1,idusuario=:p2,lugar=:p3,fsalida=:p4,fretorno=:p5,hsalida=:p6,hretorno=:p7,estado=:p8 where idr=:p0");
        $stmt->bindValue(':p1', $_P['idm'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['idusuario'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['lugar'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['fsalida'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['fretorno'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['hsalida'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['hretorno'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['activo'] , PDO::PARAM_INT);
        $stmt->bindValue(':p0', $_P['idr'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
     }
     function delete($_P ) {
        $stmt = $this->db->prepare("DELETE FROM dregistro WHERE idr = :p1");
        $stmt->bindValue(':p1', $_P['idr'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
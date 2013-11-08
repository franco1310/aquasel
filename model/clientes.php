<?php
include_once("Main.php");
class clientes extends Main
{
   function index($query , $p ) {
        $sql = "select c.idc,
                       z.descripcion,
                       c.nombre_razon,
                       c.dni_ruc,
                       c.direccion,
                       c.telefono,
                       CASE c.ide
                            WHEN 1 THEN 'PRESTADO'
                            WHEN 2 THEN 'DEVUELTO'
                            WHEN 3 THEN 'VENDIDO'
                        END as bidon

                from clientes as c
                inner join zona as z on z.idz=c.idz
                where nombre_razon like :query";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE idc = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
       function Search_u($query)
    {
        $query = "%".$query."%";
        $statement = $this->db->prepare("SELECT * FROM clientes WHERE nombre_razon like :query");
        $statement->bindParam (":query", $query , PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }
    function insert($_P ) {
        $stmt = $this->db->prepare("insert into clientes (nombre_razon,dni_ruc,direccion,telefono,idz,ide) values(:p1,:p2,:p3,:p4,:p5,:p6)");
        $stmt->bindValue(':p1', $_P['nombre_razon'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['dni_ruc'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['direccion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['telefono'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['idz'] , PDO::PARAM_INT);
        $stmt->bindValue(':p6', $_P['ide'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P )
    {
        $stmt = $this->db->prepare("update clientes set nombre_razon=:p1,dni_ruc=:p2,direccion=:p3,telefono=:p4,idz=:p5,ide=:p6 where idc=:p0");
        $stmt->bindValue(':p1', $_P['nombre_razon'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['dni_ruc'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['direccion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['telefono'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['idz'] , PDO::PARAM_INT);
        $stmt->bindValue(':p6', $_P['ide'] , PDO::PARAM_INT);
        $stmt->bindValue(':p0', $_P['idc'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
     }
     function delete($_P ) {
        $stmt = $this->db->prepare("DELETE FROM clientes WHERE idc = :p1");
        $stmt->bindValue(':p1', $_P['idc'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
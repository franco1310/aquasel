<?php
include_once("Main.php");
class proveedores extends Main
{
   function index($query , $p ) {
        $sql = "select * from proveedores where razon_social <>'' and razon_social like :query";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM proveedores WHERE idp = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
       function Search_u($query)
    {
        $query = "%".$query."%";
        $statement = $this->db->prepare("SELECT * FROM proveedores WHERE razon_social like :query");
        $statement->bindParam (":query", $query , PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }
    function insert($_P ) {
        $stmt = $this->db->prepare("insert into proveedores (razon_social,ruc,jiron,telefono) values(:p1,:p2,:p3,:p4)");
        $stmt->bindValue(':p1', $_P['razon_social'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['ruc'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['jiron'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['telefono'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P )
    {
        $stmt = $this->db->prepare("update proveedores set razon_social=:p1,ruc=:p2,jiron=:p3,telefono=:p4 where idp=:p0");
        $stmt->bindValue(':p1', $_P['razon_social'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['ruc'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['jiron'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['telefono'] , PDO::PARAM_STR);
        $stmt->bindValue(':p0', $_P['idp'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
     }
     function delete($_P ) {
        $stmt = $this->db->prepare("DELETE FROM proveedores WHERE idp = :p1");
        $stmt->bindValue(':p1', $_P['idp'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
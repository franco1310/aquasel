<?php
include_once("Main.php");
include_once("../lib/class.upload.php");
class materiales extends Main
{
   function index($query , $p ) {
        $sql = "select * from materiales where descripcion like :query";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM materiales WHERE idm = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
		
        $stmt = $this->db->prepare("insert into materiales (descripcion,cantidad) values(:p1,:p2)");
        $stmt->bindValue(':p1', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['cantidad'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
	
	
	}
    function update($_P )
    {
        $stmt = $this->db->prepare("update materiales set descripcion=:p1,cantidad=:p2 where idm=:p0");
        $stmt->bindValue(':p1', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['cantidad'] , PDO::PARAM_INT);
        $stmt->bindValue(':p0', $_P['idm'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
     }
     function delete($_P ) {
        $stmt = $this->db->prepare("DELETE FROM materiales WHERE idm = :p1");
        $stmt->bindValue(':p1', $_P['idm'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
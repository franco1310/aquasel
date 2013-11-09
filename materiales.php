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
        $stmt = $this->db->prepare("SELECT * FROM materiales WHERE idmat = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
      function Search_u($query)
    {
        $query = "%".$query."%";
        $statement = $this->db->prepare("SELECT m.idmat,m.descripcion,me.descripcion
                                    from materiales as m
                                    inner join medidas as me on me.idm=m.idm WHERE m.descripcion like :query");
        $statement->bindParam (":query", $query , PDO::PARAM_STR);
        $statement->execute();
        $data = array();
        foreach ($statement->fetchAll() as $r) {
            $data[] = array('idmat'=>$r[0],'mat'=>$r[1],'med'=>$r[2]);
        }        
        return $data;
    }
    function insert($_P ) {
		
        $stmt = $this->db->prepare("insert into materiales (descripcion,modelos,marca,stock,stockm,idm) values(:p1,:p2,:p3,:p4,:p5,:p6)");
        $stmt->bindValue(':p1', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['modelos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['marca'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['stock'] , PDO::PARAM_INT);
        $stmt->bindValue(':p5', $_P['stockm'] , PDO::PARAM_INT);
        $stmt->bindValue(':p6', $_P['idm'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
	
	
	}
    function update($_P )
    {
        $stmt = $this->db->prepare("update materiales set descripcion=:p1,modelos=:p2,marca=:p3,stock=:p4,stockm=:p5,idm=:p6 where idmat=:p0");
        $stmt->bindValue(':p1', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['cantidad'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['modelos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['marca'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['stock'] , PDO::PARAM_INT);
        $stmt->bindValue(':p5', $_P['stockm'] , PDO::PARAM_INT);
        $stmt->bindValue(':p6', $_P['idm'] , PDO::PARAM_INT);
        $stmt->bindValue(':p0', $_P['idmat'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
     }
     function delete($_P ) {
        $stmt = $this->db->prepare("DELETE FROM materiales WHERE idmat = :p1");
        $stmt->bindValue(':p1', $_P['idmat'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
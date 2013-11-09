<?php
include_once("Main.php");
class area extends Main
{
   function index($query , $p ) {
        $sql = "select * from area where area<>'' and area like :query";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM area WHERE ida = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
       $stmt = $this->db->prepare("insert into area (area,responsable) values(:p1,:p2)");
        $stmt->bindValue(':p1', $_P['area'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['responsable'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P )
    {
        $stmt = $this->db->prepare("update area set area=:p1,responsable=:p2 where ida=:p0");
        $stmt->bindValue(':p1', $_P['area'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['responsable'] , PDO::PARAM_STR);
        $stmt->bindValue(':p0', $_P['ida'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
     }
     function delete($_P ) {
        $stmt = $this->db->prepare("DELETE FROM area WHERE ida = :p1");
        $stmt->bindValue(':p1', $_P['ida'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
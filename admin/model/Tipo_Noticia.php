<?php
include_once("Main.php");
class Tipo_Noticia extends Main
{
   function index($query , $p ) {
        $sql = "select * from tiponoticia where descripcion like :query";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM tiponoticia WHERE idtiponoticia = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
       $stmt = $this->db->prepare("insert into tiponoticia (descripcion) values(:p1)");
        $stmt->bindValue(':p1', $_P['descripcion'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P )
    {
        $stmt = $this->db->prepare("update tiponoticia set descripcion=:p1 where idtiponoticia=:p0");
        $stmt->bindValue(':p1', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p0', $_P['idtiponoticia'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
     }
     function delete($_P ) {
        $stmt = $this->db->prepare("DELETE FROM tiponoticia WHERE idtiponoticia = :p1");
        $stmt->bindValue(':p1', $_P['idtiponoticia'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
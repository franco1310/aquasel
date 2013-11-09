<?php
include_once("Main.php");
class Tipo_Usuario extends Main
{
   function index($query , $p ) {
        $sql = "select * from tipousuario where descripcion like :query";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM tipousuario WHERE idtipousuario = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
       $stmt = $this->db->prepare("insert into tipousuario (descripcion) values(:p1)");
        $stmt->bindValue(':p1', $_P['descripcion'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P )
    {
        $stmt = $this->db->prepare("update tipousuario set descripcion=:p1 where idtipousuario=:p0");
        $stmt->bindValue(':p1', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p0', $_P['idtipousuario'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
     }
     function delete($_P ) {
        $stmt = $this->db->prepare("DELETE FROM tipousuario WHERE idtipousuario = :p1");
        $stmt->bindValue(':p1', $_P['idtipousuario'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
<?php
include_once("Main.php");
class reportes extends Main
{
   function data_clientes($g)
    {
        $sql = "SELECT c.idc as idc,
                       z.descripcion as zona,
                       c.nombre_razon as nombres,
                       c.dni_ruc as dni,
                       c.direccion as direccion,
                       c.telefono as telefono 
                from clientes as c
                inner join zona as z on z.idz=c.idz
                WHERE c.idz=:id
                ORDER by c.nombre_razon";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':id',$g,PDO::PARAM_STR);
        
            $stmt->execute();
            $r2 = $stmt->fetchAll();        
        return array($r2);
    }

    function data_ventas($g)
    {
       
       $fechai = $this->fdate($g['fechai'],'EN');
       $fechaf = $this->fdate($g['fechaf'],'EN');
       
       $sql = "SELECT sum(cantidad) as cantidad,
                      CASE estado
                      WHEN 0 THEN 'CREDITO'
                      WHEN 1 THEN 'CONTADO'
                      END AS bidones,
                      precio,
                      precio*sum(cantidad) as total
                FROM detallemov
                WHERE fecha between :f1 and :f2
                GROUP BY precio";
       
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':f1',$fechai,PDO::PARAM_STR);
        $stmt->bindParam(':f2',$fechaf,PDO::PARAM_STR);
        $stmt->execute();
        $r2 = $stmt->fetchAll();   
        //var_dump($r2);die();     
        return array($r2);
    }
    
}
?>
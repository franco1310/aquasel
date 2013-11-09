<?php
include_once("Main.php");
class credito extends Main
{
   function index($query , $p ) {
            $sql = "select DISTINCT m.idmov,
                  c.nombre_razon,
                  c.dni_ruc,
                  m.fechamov,
                  m.estado,
                  sum(dm.cantidad * dm.precio)AS total,
                  m.idc

                from movimiento as m
                    inner join clientes as c on c.idc=m.idc
                    INNER JOIN detallemov AS dm ON dm.idmov = m.idmov                  
                where m.estado=0 and c.nombre_razon like :query  
                group by m.idmov order by m.fechamov desc";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT dm.iddetmov, 
                                           dm.concepto, 
                                           dm.cantidad, 
                                           dm.fecha, 
                                           c.nombre_razon,
                                           dm.precio,
                                           dm.cantidad*dm.precio as total
                                    FROM detallemov AS dm
                                    INNER JOIN movimiento AS m ON m.idmov = dm.idmov
                                    INNER JOIN clientes AS c ON c.idc = m.idc

                                    WHERE dm.idmov = :id ");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function ver_detalle($id)
    {

        $stmt = $this->db->prepare("SELECT  dm.iddetmov, 
                                           dm.concepto, 
                                           dm.cantidad, 
                                           dm.fecha, 
                                           c.nombre_razon,
                                           dm.precio,
                                           dm.cantidad*dm.precio as total
                                    FROM detallemov AS dm
                                    INNER JOIN movimiento AS m ON m.idmov = dm.idmov
                                    INNER JOIN clientes AS c ON c.idc = m.idc
                                    
                                    WHERE dm.idmov = :id and m.estado=0 and dm.estado=0");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function ver_detalle2($id)
    {

        $stmt = $this->db->prepare("SELECT  dm.iddetmov, 
                                           dm.concepto, 
                                           dm.cantidad, 
                                           dm.fecha, 
                                           c.nombre_razon,
                                           dm.precio,
                                           dm.cantidad*dm.precio as total,
                                           m.idmov
                                    FROM detallemov AS dm
                                    INNER JOIN movimiento AS m ON m.idmov = dm.idmov
                                    INNER JOIN clientes AS c ON c.idc = m.idc
                                    
                                    WHERE m.idc = :id AND m.estado =0 and dm.estado = 0
                                    order by dm.fecha desc");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function insert($_P ) {

      $fmov=$_P['fechamov'];

      //$entregado=$_P['entregado'];
      $idc=$_P['idc'];
      $iduser=$_P['idusuario'];


      $cons="insert into movimiento (idtm,idc,idusuario,fechamov,estado,idp,idd) 
                                    values(2,$idc,$iduser,'$fmov',0,0,0)";
      $stmt = $this->db->prepare($cons);

      $stmt->execute();
      
      //var_dump($stmt);die(); 

      $idmov =$this->db->lastInsertId();
     
      foreach($_P['material'] as $i=>$value){
      
      
      $m=$_P['material'][$i];
      $c=$_P['cant'][$i];
      $p=$_P['price'][$i];
      //$f=$_P['fecha'][$i];

      $sl="insert into detallemov (idmov,idmat,concepto,fecha,cantidad,precio) 
                                  values($idmov,$m,'Agua','$fmov',$c,$p)";
      $stmt = $this->db->prepare($sl);
      $p1=$stmt->execute();
      //var_dump($stmt);die();  

      /*if($p1==true){
          $con="UPDATE materiales set stock=stock-$c where idmat=$m";  
          $stmt = $this->db->prepare($con);
          $e=$stmt->execute();
             }


      */
      }
      $p2 = $stmt->errorInfo();
      //die($p2[2]);
        return array($p1 , $p2[2]);
    }
    function pago($p)
    {
      $fecha = date('Y-m-d');
      $estado = 1;
      foreach($p['ck'] as $i => $value)
      {
        $stmt = $this->db->prepare("UPDATE detallemov set estado=:p1, fecha = :p2 where iddetmov = :p0");
        $stmt->bindValue(':p1', $estado , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $fecha , PDO::PARAM_STR);   
        $stmt->bindValue(':p0', $value , PDO::PARAM_INT);
        $stmt->execute();

        $stmt = $this->db->prepare("SELECT COUNT( * ) AS n, t.n as idmov
                                    FROM detallemov AS a
                                    INNER JOIN (

                                    SELECT idmov AS n
                                    FROM detallemov
                                    WHERE iddetmov = ".$value."
                                    ) AS t ON a.idmov = t.n
                                    where a.estado = 0");
        $stmt->execute();
        $n = $stmt->fetchObject();
        //var_dump($n->idmov);die();
        if($n->n==0)
        {
         $fechamov = date('Y-m-d'); 
         $stmt1 = $this->db->prepare("SELECT COUNT( * ) AS n, t.n as idmov
                                    FROM detallemov AS a
                                    INNER JOIN (

                                    SELECT idmov AS n
                                    FROM detallemov
                                    WHERE iddetmov = ".$value."
                                    ) AS t ON a.idmov = t.n");
        $stmt1->execute();
        $n1 = $stmt1->fetchObject();
        $stmt1 = $this->db->prepare("UPDATE movimiento set estado = 1,
                                                              idtm = 1,
                                                          fechamov = '$fechamov' 
                                      where idmov = ".$n1->idmov);
          $stmt1->execute(); 
        

       // var_dump($stmt);die();  
        }
        
        
      }
      return true;


    }
    function update($_P )
    {
        $stmt = $this->db->prepare("UPDATE credito set idm=:p1,idusuario=:p2,lugar=:p3,fsalida=:p4,fretorno=:p5,hsalida=:p6,hretorno=:p7,estado=:p8 where idr=:p0");
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
  
    function anular($_P ) {
        $stmt = $this->db->prepare("UPDATE movimiento SET estado=0 WHERE idmov = :p1");
        $stmt->bindValue(':p1', $_P , PDO::PARAM_INT);
        $p1 = $stmt->execute();

        if($p1==true)
          {
          
              $s="SELECT idmat,cantidad FROM detallemov WHERE idmov=:p2";
              $stmt = $this->db->prepare($s);
              $stmt->bindValue(':p2', $_P , PDO::PARAM_INT);
              $p1 = $stmt->execute();          

              foreach ($stmt->fetchAll() as $i => $row)
               {
                $ca=$row['cantidad'];
                $mat=$row['idmat'];
              
                $con="UPDATE materiales set stock=stock-$ca where idmat=".$mat;  
                $stmt = $this->db->prepare($con);
                $e=$stmt->execute();
               }
         
          }

        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }

}
?>
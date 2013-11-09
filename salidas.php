<?php
include_once("Main.php");
class salidas extends Main
{
   function index($query , $p ) {
        $sql = "select m.idmov,
                       m.entregado,
                       a.area,
                       m.fechamov,
                       m.estado

                from movimiento as m
                    inner join area as a on a.ida=m.ida                  
                where m.idtm=6 and a.area like :query order by m.fechamov desc";

        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM salidas WHERE idr = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function ver_detalle($id)
    {

        $stmt = $this->db->prepare("SELECT dm.iddetmov,m.entregado,
                                           ma.descripcion,dm.cantidad,
                                           m.fechamov,a.area

                                    FROM detallemov as dm

                                        inner join materiales as ma on ma.idmat=dm.idmat
                                        inner join movimiento as m on m.idmov=dm.idmov
                                        inner join area as a on m.ida=m.ida
                                    
                                    WHERE a.area<>'' and m.entregado<>''and m.idmov = :id");

        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function insert($_P ) {

      $fmov=$_P['fechamov'];
      $entregado=$_P['entregado'];
      $ida=$_P['ida'];
      $iduser=$_P['idusuario'];

      $cons="insert into movimiento (fechamov,entregado,serie,num,idp,idd,ida,idtm,idusuario,resp_compra,estado) 
                                    values('$fmov','$entregado','','',0,0,$ida,6,$iduser,'',1)";
      $stmt = $this->db->prepare($cons);

      $stmt->execute();
      
      //var_dump($stmt);die(); 

      $idmov =$this->db->lastInsertId();
     
      foreach($_P['material'] as $i=>$value){
      
      
      $m=$_P['material'][$i];
      $c=$_P['cant'][$i];

      $sl="insert into detallemov (idmat,idmov,cantidad,precio) 
                                  values($m,$idmov,$c,0)";
      $stmt = $this->db->prepare($sl);
      $p1=$stmt->execute();
      //var_dump($stmt);die();  

      if($p1==true){
          $con="UPDATE materiales set stock=stock-$c where idmat=$m";  
          $stmt = $this->db->prepare($con);
          $e=$stmt->execute();
             }


      }

      $p2 = $stmt->errorInfo();
      //die($p2[2]);
        return array($p1 , $p2[2]);
    }
    function update($_P )
    {
        $stmt = $this->db->prepare("update salidas set idm=:p1,idusuario=:p2,lugar=:p3,fsalida=:p4,fretorno=:p5,hsalida=:p6,hretorno=:p7,estado=:p8 where idr=:p0");
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
              
                $con="UPDATE materiales set stock=stock+$ca where idmat=".$mat;  
                $stmt = $this->db->prepare($con);
                $e=$stmt->execute();
               }
         
          }


        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
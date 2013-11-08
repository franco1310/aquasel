<?php
include_once("Main.php");
class ingresos extends Main
{
   function index($query , $p ) {
            $sql = "select 
                       m.idmov,p.razon_social,
                      sum((dm.cantidad*dm.precio))as total,
                       d.descripcion as documento,
                       concat(m.serie,'-',m.num) as numero,
                       m.fechamov,
                       m.resp_compra,
                       m.estado

                    from movimiento as m

                      inner join proveedores as p on p.idp=m.idp
                      inner join detallemov as dm on dm.idmov=m.idmov
                      inner join documento as d on d.idd=m.idd

                where m.idtm=5 and p.razon_social like :query group by m.idmov order by m.fechamov desc";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT m.*,p.razon_social,d.descripcion 
                                    FROM movimiento as m
                                        inner join proveedores as p on p.idp=m.idp
                                        inner join documento as d on d.idd=m.idd
                                    WHERE idmov = :id and d.descripcion <> 'null'");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function ver_detalle($id)
    {

        $stmt = $this->db->prepare("SELECT dm.iddetmov,
                                           p.razon_social,
                                           ma.descripcion,
                                           dm.cantidad,
                                           dm.precio,
                                           (dm.cantidad*dm.precio)as total,
                                           m.fechamov,
                                           d.descripcion as documento,
                                           concat(m.serie,'-',m.num)as numero,
                                           m.resp_compra

                FROM detallemov as dm

                          inner join materiales as ma on ma.idmat=dm.idmat
                          inner join movimiento as m on m.idmov=dm.idmov
                          inner join proveedores as p on p.idp=m.idp
                          inner join documento as d on d.idd=m.idd 
                          WHERE m.idmov = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    function insert($_P ) {

      $fmov=$_P['fechamov'];
      $serie=$_P['serie'];
      $num=$_P['num'];
      $idp=$_P['idp'];
      $idd=$_P['idd'];
      $iduser=$_P['idusuario'];
      $resp=$_P['resp_compra'];

      $cons="insert into movimiento (fechamov,entregado,serie,num,idp,idd,ida,idtm,idusuario,resp_compra,estado) 
                                    values('$fmov','','$serie','$num',$idp,$idd,0,5,$iduser,'$resp',1)";
      $stmt = $this->db->prepare($cons);
      $stmt->execute();
      $idmov =$this->db->lastInsertId();
      
      foreach($_P['material'] as $i=>$value){
      
      
      $m=$_P['material'][$i];
      $c=$_P['cant'][$i];
      $p=$_P['price'][$i];

      $sl="insert into detallemov (idmat,idmov,cantidad,precio) 
                                  values($m,$idmov,$c,$p)";
      $stmt = $this->db->prepare($sl);
      $p1=$stmt->execute();
      //var_dump($stmt);die();
      
      if($p1==true){
          $con="UPDATE materiales set stock=stock+$c where idmat=$m";  
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
        $stmt = $this->db->prepare("UPDATE ingresos set idm=:p1,idusuario=:p2,lugar=:p3,fsalida=:p4,fretorno=:p5,hsalida=:p6,hretorno=:p7,estado=:p8 where idr=:p0");
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
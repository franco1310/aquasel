<?php
require_once '../lib/Spdo.php';
class Main extends Spdo {
    protected $db;
    protected $rows = 10;
    protected $pag = 5;
    public function  __construct() {
        $this->db = Spdo::singleton();
        $this->db->query('SET NAMES UTF8');
    }
    function getList() {
        $sth = $this->db->prepare("SELECT * FROM {$this->table}");
        $sth->execute();
        return $sth->fetchAll();
    }
    public function ffecha($fecha){
        $nfecha = explode("/",$fecha);
        return $nfecha[2]."-".$nfecha[1]."-".$nfecha[0];
    }
     public function getfecha($fecha){
         $nfecha = explode("-",$fecha);
        return $nfecha[2]."/".$nfecha[1]."/".$nfecha[0];
    }
    public function getTotal( $sql , $param ) {
        $statement = $this->db->prepare($sql);
        foreach ($param as $key => $value) {
            switch ($value['type']) {
                case 'STR':
                    $statement->bindParam ($value['key'], $value['value'] , PDO::PARAM_STR);
                    break;
                default:
                    $statement->bindParam ($value['key'], $value['value'] , PDO::PARAM_INT);
                    break;
            }
        }
        $statement->execute();
        return $statement->rowCount();
    }
    public function getRow( $sql , $param , $p  ) {
        $p = $this->rows*($p-1);
        $sql = $sql . " LIMIT {$this->rows} OFFSET {$p} ";
        $statement = $this->db->prepare($sql);
        foreach ($param as $key => $value) {
            switch ($value['type']) {
                case 'STR':
                    $statement->bindParam ($value['key'], $value['value'] , PDO::PARAM_STR);
                    break;
                default:
                    $statement->bindParam ($value['key'], $value['value'] , PDO::PARAM_INT);
                    break;
            }
        }
        $statement->execute();
        return $statement->fetchAll();
    }
    public function getRowPag ( $total_rows , $vp ){
          $data = array();
          if (ceil($total_rows/$this->rows) <= $this->pag) {
              for ($x = 1 ; $x <= ceil($total_rows/$this->rows); $x++) {
                     if ($x == $vp ) {
                            $data[] = array('active'=>1,'type'=>1, 'value'=>$x);
                        } else {
                            $data[] = array('active'=>0,'type'=>1 , 'next'=> 0, 'value'=>$x);
                        }
              }
          } else {
          $flag = TRUE;
          if(ceil($total_rows/$this->rows) % $this->pag != 0) {
                for  ($j = ceil($total_rows/$this->rows); $j >= $this->pag ; $j-- ){
                          if ($j % $this->pag == 0 ){
                              if ($vp > $j ) {
                                  $flag = FALSE;
                                for ($x = $j+1 ; $x <= ceil($total_rows/$this->rows); $x++) {
                                        if ($x == $j+1  ) {
                                            $data[] = array( 'active'=>0, 'type'=>2, 'value'=>$x-1 );

                                        }
                                        if ($x == $vp ) {
                                            $data[] = array( 'active'=>1, 'type'=>1, 'value'=>$x );
                                        } else {
                                            $data[] = array( 'active'=>0, 'type'=>1, 'value'=>$x );
                                        }
                                }
                                  break;
                              }
                              else {

                               break;
                                }
                          }
                }
                if ($flag){
                              for ($x = $vp ; $x <= ceil($total_rows/$this->rows); $x++) {
                                    if (( $x % $this->pag ) == 0 ) {
                                        if ($x - $this->pag <= 0) {
                                            $z = 1;
                                        }
                                        else {
                                            $z = ($x - $this->pag)+1;
                                        }
                                        for ($y = $z; $y <= ($x); $y++) {
                                            if ($y > $this->pag && $y == $z  ) {
                                                $data[] = array( 'active'=>0, 'type'=>2, 'value'=>$y-1 );
                                            }
                                            if ($y == $vp )  {
                                                $data[] = array( 'active'=>1, 'type'=>1, 'value'=>$y );
                                            } else {
                                                $data[] = array( 'active'=>0, 'type'=>1, 'value'=>$y );
                                            }
                                            if ($y == $x && $y != ceil($total_rows/$this->rows)  ) {
                                                $data[] = array( 'active'=>0, 'type'=>3 , 'value'=>$y+1 );
                                            }
                                        }
                                        break;
                                    }
                              }
                }


          }else{
                  for ($x = $vp ; $x <= ceil($total_rows/$this->rows); $x++) {
                                    if (( $x % $this->pag ) == 0 ) {
                                        if ($x - $this->pag <= 0) {
                                            $z = 1;
                                        }
                                        else {
                                            $z = ($x - $this->pag)+1;
                                        }
                                        for ($y = $z; $y <= ($x); $y++) {
                                            if ($y > $this->pag && $y == $z  ) {
                                                $data[] = array( 'active'=>0, 'type'=>2, 'value'=>$y-1 );
                                            }
                                            if ($y == $vp )  {
                                                $data[] = array( 'active'=>1, 'type'=>1, 'value'=>$y );
                                            } else {
                                                $data[] = array( 'active'=>0, 'type'=>1, 'value'=>$y );
                                            }
                                            if ($y == $x && $y != ceil($total_rows/$this->rows)  ) {
                                                $data[] = array( 'active'=>0, 'type'=>3 , 'value'=>$y+1 );
                                            }
                                        }
                                        break;
                                    }
                              }
          }
          }
        return $data;
    }



public function fdate($fecha,$format)
    {
        $f = preg_split('/\/|-/', $fecha);   
        $c = count($f);
        if($c==3)
        {
        $n = strlen($f[0]);
        switch ($format) {
            case 'ES':                
                if($n>2)
                {
                    return $f[2]."/".$f[1]."/".$f[0];
                }
                else 
                {
                    return $fecha;
                }
                break;
            case 'EN':                
                if($n>2)
                {
                    return $f[0]."-".$f[1]."-".$f[2];
                }
                else 
                {
                    return $f[2]."-".$f[1]."-".$f[0];
                }
                break;                
            default:
                # code...
                return $fecha;
                break;
        }
       }
       else {
           return $fecha;
       }
    }
    
}
?>

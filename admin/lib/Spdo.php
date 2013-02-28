<?php
class Spdo extends PDO {
	protected static $exec = "CALL";
    private static $instance = null;
    protected  $host = 'localhost';
    protected $port = '3306';
    protected $dbname='registro';
    protected $user='root';
    protected $password='';

	public function __construct()
	{
            /*parent::__construct("pgsql:host=".$this->host.";dbname=". strtolower($this->dbname).";user=".$this->user.";password=".$this->password.";port=".$this->port);
			$this->set($config);*/
        $dns='mysql:dbname='.$this->dbname.';host='.$this->host.';port='.$this->port;
        $user = $this->user;
        $pass = $this->password;
        parent::__construct($dns,$user,$pass);
	}

     public static function getExec()
    {
        return self::$exec;
    }
	public static function singleton()
	{
            if( self::$instance == null )
                {
                    self::$instance = new self();
                }
             return self::$instance;
            	
	}

}
?>
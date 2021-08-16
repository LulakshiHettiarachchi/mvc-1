<?php
class DB{
    public $error="";
    private $pdo=null;
    private $stmt=null;
    //connect to DB
    function __construct()
    {
        try{
            $this->pdo= new PDO(
                "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,DB_USER, DB_PASSWORD,[
                    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
                ]

                );
        }
        catch(Exception $ex){die($ex->getMessage());}
    }
    // close
    function __destruct()
    {
        if($this->stmt!==null){$this->stmt=null;}
        if($this->pdo!==null){$this->pdo=null;}
    }
    //run select code
    function select($sql, $cond=null){
        $result = false;
        try{
            $this->stmt=$this->pdo->prepare($sql);
            $this->stmt->execute($cond);
            $result=$this->stmt->fetchAll();
            return $result;
        }
        catch(Exception $ex){
            $this->error=$ex->getMessage();
            return false;
        }
    }
    function insert($sql){
        try {
            $this->pdo->exec($sql);  
            echo "Records inserted successfully.";
        }catch (Exception $ex) { 
          echo "ID Already exists";
        }
      }
}
//DB settings
define('DB_HOST','localhost');
define('DB_NAME','mvc');
define('DB_CHARSET','utf8');
define('DB_USER','root');
define('DB_PASSWORD','');
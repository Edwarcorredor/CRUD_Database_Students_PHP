<?php

    namespace App;

    class connect{
        public $con;
        function __construct(){
            try{
                $this->con=new \PDO($_ENV["DSN"].":host=".$_ENV["HOST"].";dbname=".$_ENV["DBNAME"].";user=".$_ENV["USERNAME"].";password=".$_ENV["PASSWORD"]);
                $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->con->setAttribute(\PDO::ATTR_PERSISTENT, false);
                $this->con->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
                $this->con->setAttribute(\PDO::ATTR_EMULATE_PREPARES, true);
                $this->con->setAttribute(\PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAME utf8');

            } catch(\PDOException $e){
                echo "Connection failed". $e->getMessage();
            }
        }          
    }
?>
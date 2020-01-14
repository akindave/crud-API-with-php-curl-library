<?php

Class API{
    private $connection="";

    function __Construct(){
        $this->database_connection();
    }
    function database_connection(){
        try{
        $this->connection = new PDO("mysql:host=localhost;dbname=testing","root",'');
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    function fetch_all(){
        $query = "SELECT * FROM testing ORDER BY id";
        $query_prepare = $this->connection->prepare($query);
        if($query_prepare->execute()){
            while($row = $query_prepare->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }
            return $data;
        }
    }
}
$new = new API();

?>
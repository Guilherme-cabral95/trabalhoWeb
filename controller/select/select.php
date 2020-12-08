<?php 
class select{
    private $conn;
    function select($conn){
        $this->conn = $conn;
    }

    function retornID($sql){
        $res = $this->conn->query($sql);
        $row = $res->fetch_assoc();
        return $row['id'];
    }

    function retorno($sql){
        return $this->queryToJson($sql);
    }

    private function queryToJson($sql){
        $res = $this->conn->query($sql);
        
        while($row = $res->fetch_assoc()){
            $arr[] = $row;
            
        }
        // var_dump($arr);
        return $this->response($arr);
    }

    private function response($array){
        header('Content-Type: application/json; charset = utf-8');
        return json_encode($array);
    }
    

}

?>
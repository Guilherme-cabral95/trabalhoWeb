<?php
class atualizar{
    private $conn;
    private $classe;

    function atualizar(&$_conn,$classe){
        // var_dump($_conn);
        $this->conn = $_conn;
        $this->classe = $classe;
        $this->sql = "";
    }

    function paramentro($tabela,$arr,$cond,$valor){
        $sql ="update $tabela set ";
        $param = "";
        var_dump($arr);
        foreach ($arr as $key => $value) {
            $param .= $key." = '".$value."' , ";
           
        }
        $param .= "0";
       
        $param = str_replace(", 0","",$param);
        
        $param .= "where $cond = $valor";
     
        $this->sql =  $sql.$param;

    }

    function atualiza(){
        
        if($this->conn->query($this->sql) === TRUE){
            echo "New record created successfully";
        } else {
            echo "Error: " . $this->sql . "<br>" . $this->conn->error;
        }
        
    }
}
?>
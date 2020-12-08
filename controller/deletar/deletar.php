<?php
class deletar{
    private $conn;

    function deletar(&$_conn){
        // var_dump($_conn);
        $this->conn = $_conn;
        $this->sql = "";
    }

    function paramentro($tabela,$cond,$valor){
        $sql = "delete from $tabela where $cond = $valor";
        $this->sql = $sql;
    }

    function confirma(){
        
        if($this->conn->query($this->sql) === TRUE){
            echo "New record created successfully";
        } else {
            echo "Error: " . $this->sql . "<br>" . $this->conn->error;
        }
        $this->conn->close();
        
    }
} 
?>
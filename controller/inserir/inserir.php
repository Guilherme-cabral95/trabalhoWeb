<?php
class inserir{
    private $conn;
    private $classe;

    function inserir(&$_conn,$classe){
        // var_dump($_conn);
        $this->conn = $_conn;
        $this->classe = $classe;
        $this->sql = "";
    }

    function paramentro($tabela,$arr){
        $sql ="insert into $tabela(";
        $param = "";
        foreach ($arr as $key => $value) {

            // echo $key."-".$value."</br>";
            $param .="$key , ";
            $valor .= "'$value', ";
        }
        $param .= "0";
        $valor .= "0";
        $param = str_replace(", 0","",$param);
        $valor = str_replace(", 0","",$valor);

        $param .= ")values (".$valor.")";
        // var_dump($this->conn);
        $this->sql =  $sql.$param;
    }

    function inseri(){
        
        if($this->conn->query($this->sql) === TRUE){
            echo "New record created successfully";
        } else {
            echo "Error: " . $this->sql . "<br>" . $this->conn->error;
        }
        
    }
}
?>
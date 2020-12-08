<?php 
class pessoa{
    private $nome;
    private $sobrenome;
    private $nascimento;
    private $sexo;
    private $cpf;
    private $fone;
    private $cel;
    private $tipoPessoa;

    public function __construct($nome, $sobrenome, $nascimento, $sexo,  $cpf, $fone, $cel,$tipoPessoa){
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->nascimento = $nascimento;
        $this->sexo = $sexo;
        $this->cpf = $cpf;
        $this->fone = $fone;
        $this->cel = $cel;
        $this->tipoPessoa = $tipoPessoa;
	}
	
	


    public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getSobrenome(){
		return $this->sobrenome;
	}

	public function setSobrenome($sobrenome){
		$this->sobrenome = $sobrenome;
	}

	public function getNascimento(){
		return $this->nascimento;
	}

	public function setNascimento($nascimento){
		$this->nascimento = $nascimento;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function getFone(){
		return $this->fone;
	}

	public function setFone($fone){
		$this->fone = $fone;
	}

	public function getCel(){
		return $this->cel;
	}

	public function setCel($cel){
		$this->cel = $cel;
	}
    
	public function getTipoPessoa(){
        return $this->tipoPessoa;
	}

	public function setTipoPessoa($tipoPessoa){
		$this->tipoPessoa = $tipoPessoa;
	}
}
?>
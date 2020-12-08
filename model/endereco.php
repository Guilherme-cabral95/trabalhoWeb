<?php 
class endereco{
	private $idPessoa;
    private $rua;
    private $num;
    private $ref;
    private $bairro;
    private $cep;
    private $estado;
    private $cidade;
    private $complemento;


    function __construct($rua,$num,$ref,$bairro,$cep,$estado,$cidade,$complemento)
    {
        $this->rua = $rua;
        $this->num= $num;
        $this->ref = $ref;
        $this->bairro = $bairro;
        $this->cep = $cep;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->complemento = $complemento;
	}
	
	public function getIdPessoa(){
		return $this->idPessoa;
	}

	public function setIdPessoa($idPessoa){
		$this->idPessoa = $idPessoa;
	}

	public function getRua(){
		return $this->rua;
	}

	public function setRua($rua){
		$this->rua = $rua;
	}

	public function getNum(){
		return $this->num;
	}

	public function setNum($num){
		$this->num = $num;
	}

	public function getRef(){
		return $this->ref;
	}

	public function setRef($ref){
		$this->ref = $ref;
	}

	public function getBairro(){
		return $this->bairro;
	}

	public function setBairro($bairro){
		$this->bairro = $bairro;
	}

	public function getCep(){
		return $this->cep;
	}

	public function setCep($cep){
		$this->cep = $cep;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getCidade(){
		return $this->cidade;
	}

	public function setCidade($cidade){
		$this->cidade = $cidade;
	}

	public function getComplemento(){
		return $this->complemento;
	}

	public function setComplemento($complemento){
		$this->complemento = $complemento;
	}

}
?>
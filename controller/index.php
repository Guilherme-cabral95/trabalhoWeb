<?php
error_reporting(E_ALL);
require '../model/endereco.php';
require '../model/pessoa.php';
require './connexao/conn.php';
require './inserir/inserir.php';
require './select/select.php';
require './atualizar/atualizar.php';
require './deletar/deletar.php';

// var_dump($_POST);
$id = $_REQUEST['id'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$nascimento = $_POST['nasc'];
$sexo = $_POST['sexo'];
$cpf= $_POST['cpf'];
$fone= $_POST['fone'];
$cel= $_POST['cel'];
$rua= $_POST['rua'];
$num= $_POST['num'];
$ref= $_POST['ref'];
$bairro= $_POST['bairro'];
$cep= $_POST['cep'];
$estado= $_POST['estado'];
$cidade= $_POST['cidade'];
$complemento= $_POST['compl'];
$tipoPessoa= $_POST['tipoPessoa'];
$seq = $_REQUEST['sequence'];
$id_endereco = $_REQUEST['id_endereco'];
$pessoa = new pessoa($nome,$sobrenome,$nascimento,$sexo,$cpf,$fone,$cel,$tipoPessoa);

$endereco = new endereco($rua,$num,$ref,$bairro,$cep,$estado,$cidade,$complemento);


//  echo $seq;

$conn = new conn('localhost','root','','PessoaVirtual');
$connexao = $conn->conectar();
switch ($seq) {
        
    case 'inserir':
        $cadastro = new inserir($connexao,$pessoa);
        $cadastro->paramentro('Pessoa' ,['nome' => $pessoa->getNome(),'cpf_cnpj' => $pessoa->getCpf(),'nascimento'=> $pessoa->getNascimento(),'sexo' => $pessoa->getSexo() ,'sobrenome' => $pessoa->getSobrenome() ,'telefone' => $pessoa->getFone(),'tipoPessoa' => $pessoa->getTipoPessoa()]);
        // echo "aqui";
        $select = new select($connexao);
        $cadastro->inseri();
        $endereco->setIdPessoa($select->retornID('select id from Pessoa order by id desc limit 1'));
        $id  = $endereco->getIdPessoa();
        $cadastro->paramentro('endereco',['id_pessoa'=>$id,
        'rua'=>$endereco->getRua(),
        'numero'=>(empty($endereco->getNum())?0:$endereco->getNum()),
        'referencia'=>$endereco->getRef(),
        'bairro'=>$endereco->getBairro(),
        'cep'=>$endereco->getCep(),
        'estado'=>$endereco->getEstado(),
        'cidade'=>$endereco->getCidade(),
        'complemento'=>$endereco->getComplemento()]);
        if(!empty($endereco->getCep())){
            $cadastro->inseri();

        }
        header('Location: ../index.php?event=1');


        break;
    case 'consultar':
        $select = new select($connexao);
        echo $select->retorno('select *, adr.id as id_endereco,pes.id as id_pessoa from PessoaVirtual.Pessoa as pes
        left join PessoaVirtual.endereco as adr on adr.id_pessoa = pes.id');   
        // echo "sim";
        break;
    case 'buscarRegistros':
        $select = new select($connexao);
        
        echo $select->retorno("select *, adr.id as id_endereco,pes.id as id_pessoa from PessoaVirtual.Pessoa as pes
        left join PessoaVirtual.endereco as adr on adr.id_pessoa = pes.id
        where pes.id = $id"); 
    break;
    case 'atualizar':
        $update = new atualizar($connexao,$pessoa);
        $update->paramentro('Pessoa' ,['nome' => $pessoa->getNome(),'cpf_cnpj' => $pessoa->getCpf(),'nascimento'=> $pessoa->getNascimento(),'sexo' => $pessoa->getSexo() ,'sobrenome' => $pessoa->getSobrenome() ,'telefone' => $pessoa->getFone(),'tipoPessoa' => $pessoa->getTipoPessoa()],
        'id',$id);
        $update->atualiza();
        $update->paramentro('endereco',['id_pessoa'=>$id,
        'rua'=>$endereco->getRua(),
        'numero'=>$endereco->getNum(),
        'referencia'=>$endereco->getRef(),
        'bairro'=>$endereco->getBairro(),
        'cep'=>$endereco->getCep(),
        'estado'=>$endereco->getEstado(),
        'cidade'=>$endereco->getCidade(),
        'complemento'=>$endereco->getComplemento()],'id',$id_endereco );
        $update->atualiza();
        header('Location: ../index.php?event=2');

    break;
    case 'DeletarRegistros':
        $select = new select($connexao);
        $delete = new deletar($connexao);
        // echo 'select id from endereco where id_pessoa = '.$id;
        $id_endereco = $select->retornID('select id from endereco where id_pessoa = '.$id);
        if(!empty($id_endereco)){
           $delete->paramentro('endereco','id',$id_endereco);
           $delete->confirma();
        }
        $delete->paramentro('Pessoa','id',$id);
        $delete->confirma();
        // $connexao->close();

    break;
    
}
// echo response(['resultado'=>'deu certo']);

function response($array){
    header('Content-Type: application/json; charset = utf-8');
    return json_encode($array);
}
// echo "chegou";
?>
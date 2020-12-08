
$(document).ready( function(){

    clickmenu('#cadastro')
    clickmenu('#listar')
    function clickmenu(ids){
        

        $(ids).click(function(e){
            
            e.preventDefault()

            if(ids == '#cadastro'){
                chamada('cadastro')
            }else{
                chamada('listar')
                
            }
        })
    }
   
    
    function chamada(link,attr = undefined){
        
        // console.log("ok")
        $.ajax({
            url: './view/'+link,
            success: function(data) {
                // $('#texto_tweet').val('');
                $('#conteudo').html(data);
                if(link == 'listar'){
                    $(document).ready(function(){
                        $('#listagemGeral').DataTable({
                            "scrollY": '100%',
                            "scrollX": true,
                            "paging":false,
                            "searching":false,
                            "info": false

                        });
                        listarCadastrados()
                       
                        
                    })
                    
                }else{
                    $(document).ready(function(){
                        console.log(attr)
                        $('#nome').val(attr.nome)
                        $('#sobrenome').val(attr.sobrenome)
                        $('#cpf').val(attr.cpf_cnpj)
                        $('#fone').val(attr.telefone)
                        $('#cel').val(attr.celular)
                        $('#nasc').val(attr.nascimento)
                        $('#cep').val(attr.cep)
                        $('#rua').val(attr.rua)
                        $('#num').val(attr.numero)
                        $('#compl').val(attr.complemento)
                        $('#ref').val(attr.referencia)
                        $('#bairro').val(attr.bairro)
                        $('#cidade').val(attr.cidade)
                        $('#estado').val(attr.estado)
                        $('[name=sequence]').val('atualizar')
                        $('[name=id]').val(attr.id_pessoa)
                        $('[name=id_endereco]').val(attr.id_endereco)                       
                        $('#sexo').val(attr.sexo)
                        if(attr.tipoPessoa == 'F'){
                            $('#pf').prop("checked", true);
                            $('#pj').prop("checked", false);
                        }else{
                            $('#pf').prop("checked", false);
                            $('#pj').prop("checked", true);

                        }

                    })
                }

            }   
        })
    }
    
    function listarCadastrados(){
        $.ajax({
            method: 'GET',
            url: '../controller/index.php',
            dataType:"json",
            data:{
                sequence:'consultar'
            },
            success:function(res){
                $('#listagemGeral tbody').empty()
                
                $.each(res,function(index,val){
                    console.log(val)

                    let ids = val.id_pessoa
                 
                    let bortoes =  '<input class="form-check-input" type="radio" name="selectPes" id="selectPes" value="'+ids+'" >'
                    let  row = '<tr>'
                    row += '<td>'+(bortoes)+'</td>'
                    row += '<td>'+(val.tipoPessoa == 'F'?'Fisica':'Juridica')+'</td>'
                    row += '<td>'+val.nome+'</td>'
                    row +='<td>'+val.sobrenome+'</td>'
                    row += '<td>'+(val.sexo == 'F'?'Feminino':'Masculino')+'</td>'
                    row +='<td>'+val.cpf_cnpj+'</td>'
                    row +='<td>'+val.telefone+'</td>'
                    row +='<td>'+val.celular+'</td>'
                    row +='<td>'+val.nascimento+'</td>'
                    row +='<td>'+val.cep+'</td>'
                    row +='<td>'+val.rua+'</td>'
                    row +='<td>'+val.numero+'</td>'
                    row +='<td>'+val.complemento+'</td>'
                    row +='<td>'+val.referencia+'</td>'
                    row +='<td>'+val.bairro+'</td>'
                    row +='<td>'+val.cidade+'</td>'
                    row +='<td>'+val.estado+'</td>'
                    row += '</tr>'

                    $('#listagemGeral tbody').append(row)
                })
                acoes() 
            }
        })
    }


    function acoes(){
        $('#Atualizar').click(function(){
            const id = $('[name=selectPes]:checked').val()
            console.log(id)
            if(id == undefined){
                alert('favor selecionar um usuário' )
            }else{
                $.ajax({
                    method: 'GET',
                    url: '../controller/index.php',
                    data:{
                        id:id,
                        sequence:'buscarRegistros'
                    },
                    success:function(res){
                        $.each(res, function(index,val){

                            chamada('cadastro',val) 
                            
                        })
                    }


                })
            }

        })

        $('#deletar').click(function(){
            console.log('clicado deletar')
            const id = $('[name=selectPes]:checked').val()
            if(id == undefined){
                alert('favor selecionar um usuário' )
            }else{
                $.ajax({
                    method: 'POST',
                    url: '../controller/index.php',
                    // dataType:"json",
                    data:{
                        id:id,
                        sequence:'DeletarRegistros'
                    },
                    success:function(res){
                        console.log(res)
                        // alert('Registro efetuado com sucesso!');
                        $('#conteudo').html('')
                        chamada('listar')
                        
                        
                    }


                })
            }
            

        })
    }

    function atribuirValores(res)
    {
        console.log(res)
    }

    
   
})


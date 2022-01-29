function excluir_encomenda(id_encomenda)
{
    if(id_encomenda != "")
    {
        $.ajax({
            method: "POST",
            url: "app/Actions/delete_encomenda.php",
            data: { id: id_encomenda }
        })
        .done( (retorno) => {

            var returned = retorno.split(":"); 

            if(returned[0] == 0)
            {
                Aviso.fire({
                    icon: 'error',
                    title: returned[1]
                });
            }else {
                Aviso.fire({
                    icon: 'success',
                    title: returned[1]
                });
                setTimeout( () => { 
                    location.reload();
                }, 3000)

            }

        })

    }
    
}

function atualizarEncomenda(id_encomenda)
{

    if(id_encomenda != "")
    {
        setTimeout( () => {
        
            // Recuperar todos campos 
            var empresa_nome        = $("#empresa_nome_" + id_encomenda);
            var ac                  = $("#ac_" + id_encomenda);
            var cep                 = $("#cep_" + id_encomenda);
            var endereco_completo   = $("#endereco_completo_" + id_encomenda);
            var complemento         = $("#complemento_" + id_encomenda);
            var resp_envio          = $("#resp_envio_" + id_encomenda);
            var tipo_envio          = $("#tipo_envio_" + id_encomenda);
            var ar                  = $("#ar_" + id_encomenda);
            var data_envio          = $("#data_envio_" + id_encomenda);
            var cod_rastreio        = $("#cod_rastreio_" + id_encomenda);
    
            var obj = [
                empresa_nome, 
                ac, 
                cep, 
                endereco_completo, 
                complemento, 
                resp_envio,
                tipo_envio, 
                ar,
                data_envio,
                cod_rastreio
            ]
    
            var campos_vazios = 0;
    
            // Verificar se tem campos que nao foram preenchidos
            $.each(obj, (a, value) => {
                if(value.val() == "")
                {
                    campos_vazios++;
                }
            });
    
            if( campos_vazios > 0 )
            {
                Aviso.fire({
                    icon: 'error',
                    title: 'Prencha todos campos obrigatórios'
                });
    
                $("#cad_encomenda").show();
    
            }else {
    
                // Faz a requisição para cadastrar a encomenda
                $.ajax({
                    method: "POST",
                    url: "app/Actions/update_encomenda.php",
                    data: {
                        empresa: empresa_nome.val(),
                        ac: ac.val(),
                        cep: cep.val(),
                        endereco_completo: endereco_completo.val(),
                        complemento: complemento.val(),
                        resp_envio: resp_envio.val(),
                        tipo_envio: tipo_envio.val(),
                        ar: ar.val(),
                        data_envio: data_envio.val(),
                        id_db_encomenda: id_encomenda
                    },
                    complete: function()
                    {
                        $("#cad_encomenda").show();
                    }
                })
                .done( (returned) => {
    
                    var retorno = returned.split(":");
    
                    if(retorno[0] == 1)
                    {
                        Aviso.fire({
                            icon: 'success',
                            title: retorno[1]
                        });
                        
                    }else {
                        Aviso.fire({
                            icon: 'error',
                            title: retorno[1]
                        });
                    }
                    
                });
            }
    
        }, 1000)

    }
    
}
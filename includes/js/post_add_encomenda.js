var Aviso = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true
});

$("#cad_encomenda").click( () => {
    
    $("#cad_encomenda").hide();

    setTimeout( () => {
        
        // Recuperar todos campos 
        var empresa_nome        = $("#empresa_nome");
        var ac                  = $("#ac");
        var cep                 = $("#cep");
        var endereco_completo   = $("#endereco_completo");
        var complemento         = $("#complemento");
        var resp_envio          = $("#resp_envio");
        var tipo_envio          = $("#tipo_envio");
        var ar                  = $("#ar");
        var data_envio          = $("#data_envio");
        var cod_rastreio        = $("#cod_rastreio");

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
                url: "app/Actions/add_encomenda.php",
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
                    cod_rastreio: cod_rastreio.val()
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
                    setTimeout( () => { 
                        location.reload();
                    }, 3000)
                }else {
                    Aviso.fire({
                        icon: 'error',
                        title: retorno[1]
                    });
                }
                
            });
        }

    }, 1000)

});
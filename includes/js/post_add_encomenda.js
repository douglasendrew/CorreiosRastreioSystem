var Aviso = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000,
    timerProgressBar: true
});

$("#cad_encomenda").click( () => {
    
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
        }else {
            console.log(value.val())
        }
    });

    if( campos_vazios > 0 )
    {
        Aviso.fire({
            icon: 'error',
            title: 'Prencha todos campos obrigatórios'
        })
    }else {

        // Faz a requisição para cadastrar a encomenda
        $.ajax({
            method: "POST",
            url: "app/Actions/add_encomenda.php",
            data: {
                empresa: empresa_nome,
                ac: ac,
                cep: cep,
                endereco_completo: endereco_completo,
                complemento: complemento,
                resp_envio: resp_envio,
                tipo_envio: tipo_envio,
                ar: ar,
                data_envio: data_envio,
                cod_rastreio: cod_rastreio
            },
            error: function() {
                Aviso.fire({
                    icon: 'error',
                    title: 'Ocorreu um erro ao relizar a ação, tente novamente mais tarde'
                });
            }
        })
        .done( (returned) => {
            Aviso.fire({
                icon: 'error',
                title: 'Re: ' + returned
            });
        });
    }

});
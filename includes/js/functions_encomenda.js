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
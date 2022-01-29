function rastrearPedido(cod, id)
{
    // $("#box-hostory-order-" + id).load("app/Actions/rastreamento_correios.php");
    $.ajax({
        method: "POST",
        url: "app/Actions/rastreamento_correios.php",
        data: { cod_rastreio: cod }
    })
    .done( (returned) => {
        // alert(returned)
        $("#box-hostory-order-" + id).html(returned);
    })
}
<?php 

    $empresa    = $_POST['empresa'];
    $ac         = $_POST['ac'];
    $cep        = $_POST['cep'];
    $end_comp   = $_POST['endereco_completo'];
    $complem    = $_POST['complemento'];
    $rsp_envio  = $_POST['resp_envio'];
    $tipo_envio = $_POST['tipo_envio'];
    $ar         = $_POST['ar'];
    $data_envio = $_POST['data_envio'];
    $cod_rastr  = $_POST['cod_rastreio'];

    require __DIR__ . "/../../vendor/autoload.php";

    use SimpleWork\Framework\Models\homeModel as Encomenda;

    $json_encomenda = array(
        "empresa" => $empresa,
        "ac" => $ac,
        "cep" => $cep,
        "end_comp" => $end_comp,
        "complem" => $complem,
        "rsp_envio" => $rsp_envio,
        "tipo_envio" => $tipo_envio,
        "ar" => $ar,
        "data_envio" => $data_envio,
        "cod_rastr" => $cod_rastr,
    );

    if(Encomenda::newEncomenda($json_encomenda) == "Incluido com sucesso")
    {
        echo "1:Sucesso ao incluir a encomenda";
    }else {
        echo "0:Erro ao incluir a encomenda";
    }
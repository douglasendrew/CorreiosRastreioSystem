<?php 

    $empresa      = $_POST['empresa'];
    $ac           = $_POST['ac'];
    $cep          = $_POST['cep'];
    $end_comp     = $_POST['endereco_completo'];
    $complem      = $_POST['complemento'];
    $rsp_envio    = $_POST['resp_envio'];
    $tipo_envio   = $_POST['tipo_envio'];
    $ar           = $_POST['ar'];
    $data_envio   = $_POST['data_envio'];
    $id_encomenda = $_POST['id_db_encomenda'];

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
        "data_envio" => $data_envio
    );

    if(Encomenda::updateEncomenda($id_encomenda, $json_encomenda) == "Atualizado com sucesso")
    {
        echo "1:Sucesso ao atualizar a encomenda";
    }else {
        echo "0:Erro ao atualizar a encomenda";
    }
<?php 

    $id_encomenda = $_POST['id'];

    require __DIR__ . "/../../vendor/autoload.php";

    use SimpleWork\Framework\Models\homeModel as Encomenda;

    if(Encomenda::delEncomenda($id_encomenda) == "Excluido com sucesso")
    {
        echo "1:Encomenda excluida com sucesso";
    }else {
        echo "0:Erro ao excluir a encomenda";
    }
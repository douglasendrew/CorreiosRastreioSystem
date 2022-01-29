<?php 

    require __DIR__ . "/../../vendor/autoload.php";

    use SimpleWork\Functions\Correios;

    $cod = $_POST['cod_rastreio'];
    Correios::rastrearEncomenda($cod);
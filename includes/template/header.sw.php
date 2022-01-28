<?php 
    require __DIR__ . "/../../vendor/autoload.php";
    use SimpleWork\Framework\Page\Site;
    use SimpleWork\Core\Run;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php Run::loadIncludes(); ?>
    
    <title><?= Site::genTitlePage() ?></title>
</head>
<body>
    
    <nav class="uk-navbar-container uk-margin" uk-navbar="mode: click">

        <div class="uk-navbar-left">

            <ul class="uk-navbar-nav">

                <li class="uk-active"><a href="#" style="font-size: 25px;">Nome da Empresa</a></li>

            </ul>

        </div>

    </nav>

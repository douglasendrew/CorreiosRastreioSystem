<?php 

    require __DIR__ . "/../../vendor/autoload.php";

    use SimpleWork\Framework\Models\homeModel as Encomenda;

    $list = Encomenda::listEncomendas()
        ->fetchAll();

    if(count($list) > 0)
    {
        echo 'Total de encomendas: ' . count($list);
        foreach ( $list as $encomenda )
        {
            echo '
            <div class="uk-grid-medium uk-flex-middle" uk-grid>
                <article class="uk-comment uk-visible-toggle" tabindex="-1">
                    <header class="uk-comment-header uk-position-relative">
                        <div class="uk-grid-medium uk-flex-middle" uk-grid>
                            <div class="uk-width-auto">
                                <img class="uk-comment-avatar" src="https://rastreamento.correios.com.br/static/rastreamento-internet/imgs/pre-atendimento-cor.png" width="80" height="80" alt="">
                            </div>
                            <div class="uk-width-expand">
                                <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">QI560867216BR</a></h4>
                                <p class="uk-comment-meta uk-margin-remove-top"><a class="uk-link-reset" href="#">12 days ago</a></p>
                            </div>
                        </div>
                    </header>
                </article>
            </div>
            <hr>';
        }
    }
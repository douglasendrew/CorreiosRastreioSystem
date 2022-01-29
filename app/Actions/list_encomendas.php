<?php 

    require __DIR__ . "/../../vendor/autoload.php";

    use SimpleWork\Framework\Models\homeModel as Encomenda;

    $list = Encomenda::listEncomendas()
        ->fetchAll();

    if(count($list) > 0)
    {

        $tipos_envios = array("Carta Comum", "Carta Registrada", "PAC", "SEDEX");

        echo '<p>Total de encomendas: ' . count($list) . '</p>';
        foreach ( $list as $encomenda )
        {

            $id = $encomenda['id'];

            echo '
                <div class="uk-grid-medium uk-flex-middle" uk-grid>
                    <article class="uk-comment uk-visible-toggle" tabindex="-1">
                        <header class="uk-comment-header uk-position-relative">
                            <div class="uk-grid-medium uk-flex-middle" uk-grid>
                                <div class="uk-width-auto">
                                    <img class="uk-comment-avatar" src="https://rastreamento.correios.com.br/static/rastreamento-internet/imgs/pre-atendimento-cor.png" width="70" alt="">
                                </div>
                                <div class="">
                                    <h4 class="uk-comment-title uk-margin-remove">
                                        <a class="uk-link-reset" href="#modal-encomenda-'.$id.'" uk-toggle>'. strtoupper($encomenda['cod_rastreio']) .'</a>
                                    </h4>
                                    <p class="uk-comment-meta uk-margin-remove-top">
                                        <a class="uk-link-reset">Enviado em: '. $encomenda['data_envio'] .'</a>
                                    </p>
                                </div>
                            </div>
                        </header>
                    </article>
                </div>
                <hr>
                
                <div id="modal-encomenda-'.$id.'" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                        <button class="uk-modal-close-default" type="button" uk-close></button>
                        <h2 class="uk-modal-title">'. strtoupper($encomenda['cod_rastreio']) .'</h2>
                        <p>
                            <div class="uk-margin">
                                <input value="'.$encomenda['nome_empresa'].'" id="empresa_nome" class="uk-input" type="text" placeholder="Nome da empresa *" required>
                                <input value="'.$encomenda['ac'].'" id="ac" class="uk-input uk-margin-small-top" type="text" placeholder="A/C Destinatário *" required>
                                <input value="'.$encomenda['cep'].'" id="cep" class="cep uk-input uk-margin-small-top" type="text" placeholder="CEP *" required>
                                <input value="'.$encomenda['endereco'].'" id="endereco_completo" class="uk-input uk-margin-small-top" type="text" placeholder="Endereço *" required>
                                <input value="'.$encomenda['complemento'].'" id="complemento" class="uk-input uk-margin-small-top" type="text" placeholder="Complemento *" required>
                                <input value="'.$encomenda['pessoa_responsavel'].'" id="resp_envio" class="uk-input uk-margin-small-top" type="text" placeholder="Resp. do Envio *" required>
                                <select id="tipo_envio" class="uk-select uk-margin-small-top">
                                    <option disabled selected>-- Tipo de envio * --</option>
                                    <option>Carta Comum</option>
                                    <option>Carta Registrada</option>
                                    <option>PAC</option>
                                    <option>SEDEX</option>
                                </select>
                                <input value="'.$encomenda['ar'].'" id="ar" class="uk-input uk-margin-small-top" type="text" placeholder="AR *" required>
                                <input value="'.$encomenda['data_envio'].'" id="data_input_enc data_envio" class="uk-input uk-margin-small-top" type="text" placeholder="Data Envio *" required>
                                <input disabled value="'.$encomenda['cod_rastreio'].'" class="uk-input uk-margin-small-top" type="text" placeholder="Código de Rastreio *" required>

                                <div class="uk-margin-small-top">
                                    <button id="cad_encomenda" class="uk-button uk-button-primary">Atualizar</button>
                                    <button uk-toggle="target: #excluir-encomenda-'.$id.'" id="" class="uk-button uk-button-danger">Excluir</button>
                                    ';
                                    ?>
                                    <button onclick="rastrearPedido('<?= strtoupper($encomenda['cod_rastreio']) ?>', '<?= $id ?>')" uk-toggle="target: #modal-rastrear-pedido-<?= $id ?>" class="uk-button uk-button-default"><span uk-icon="location"></span> Rastrear Pedido</button>
                                    <?php
                echo '
                                </div>
                            </div>
                        </p>
                    </div>
                </div>

                <div id="modal-rastrear-pedido-'.$id.'" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                        <button class="uk-modal-close-default" type="button" uk-close></button>
                        <h2 class="uk-modal-title">Rastrear Pedido</h2>
                        <p id="box-hostory-order-'. $id .'"></p>
                    </div>
                </div>

                <div id="excluir-encomenda-'.$id.'" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                        <h2 class="uk-modal-title">Excluir '.strtoupper($encomenda['cod_rastreio']).'</h2>
                        <p>Você realmente deseja excluir?</p>
                        <p class="uk-text-right">
                            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>';
                            ?>
                            <button onclick="excluir_encomenda('<?= $id ?>')" class="uk-button uk-button-primary" type="button">Confirmar</button>
                            <?php
            echo '
                        </p>
                    </div>
                </div>
                
            ';

        }

    }
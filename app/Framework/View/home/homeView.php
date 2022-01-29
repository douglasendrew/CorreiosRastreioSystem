<div class="uk-container uk-container-expand">

    <p style="font-size: 22px;" class="uk-margin-medium-top">Acompanhar Correspondências</p>
    <hr>

    <button class="uk-button uk-button-primary" uk-toggle="target: #add-encomenda">Adicionar Encomenda</button>

    <!-- Modal de cadastro de correspondências -->
    <div id="add-encomenda" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <h2 class="uk-modal-title">Adicione uma encomenda</h2>
            <p>
            <div class="uk-margin">
                <input id="empresa_nome" class="uk-input" type="text" placeholder="Nome da empresa *" required>
                <input id="ac" class="uk-input uk-margin-small-top" type="text" placeholder="A/C Destinatário *" required>
                <input id="cep" class="cep uk-input uk-margin-small-top" type="text" placeholder="CEP *" required>
                <input id="endereco_completo" class="uk-input uk-margin-small-top" type="text" placeholder="Endereço *" required>
                <input id="complemento" class="uk-input uk-margin-small-top" type="text" placeholder="Complemento *" required>
                <input id="resp_envio" class="uk-input uk-margin-small-top" type="text" placeholder="Resp. do Envio *" required>
                <select id="tipo_envio" class="uk-select uk-margin-small-top">
                    <option disabled selected>-- Tipo de envio * --</option>
                    <option>Carta Comum</option>
                    <option>Carta Registrada</option>
                    <option>PAC</option>
                    <option>SEDEX</option>
                </select>
                <input id="ar" class="uk-input uk-margin-small-top" type="text" placeholder="AR *" required>
                <input id="data_input_enc data_envio" class="uk-input uk-margin-small-top" type="text" placeholder="Data Envio *" required>
                <input id="cod_rastreio" class="uk-input uk-margin-small-top" type="text" placeholder="Código de Rastreio *" required>

                <div class="uk-margin-small-top" style="text-align: center;">
                    <button id="cad_encomenda" class="uk-button uk-button-primary">Confirmar</button>
                </div>
            </div>
            </p>
        </div>
    </div>

    <!-- LISTAGEM DE CORRESPONDENCIAS -->
    <div class="uk-margin-large-top">
        <div id="listagem_encomendas"></div>
        <!-- DIV 2 -->
        <!-- <div class="uk-grid-medium uk-flex-middle" uk-grid>
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
                    <div class="uk-position-top-left uk-position-small uk-hidden-hover">
                        <a class="uk-link-muted" href="#">Reply</a>
                    </div>
                </header>
            </article>
        </div>
        <hr> -->

    </div>

</div>


<!-- JS includes da página -->
<script src="includes/js/post_add_encomenda.js"></script>
<script src="includes/js/listagem_enc.js"></script>
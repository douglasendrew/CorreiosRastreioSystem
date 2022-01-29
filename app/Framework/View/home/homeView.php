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
                    <option value="Carta Comum">Carta Comum</option>
                    <option value="Carta Registrada">Carta Registrada</option>
                    <option value="PAC">PAC</option>
                    <option value="SEDEX">SEDEX</option>
                </select>
                <input id="ar" class="uk-input uk-margin-small-top" type="text" placeholder="AR *" required>
                <input id="data_envio" class="data_input_enc uk-input uk-margin-small-top" type="text" placeholder="Data Envio *" required>
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
    </div>

</div>


<!-- JS includes da página -->
<script src="includes/js/post_add_encomenda.js"></script>
<script src="includes/js/listagem_enc.js"></script>
<script src="includes/js/functions_encomenda.js"></script>
<script src="includes/js/rastrear_pedido.js"></script>
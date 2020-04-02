<!-- Modal Cadastrar cidades-->
<div class="modal fade" id="modalCadastraCidades" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de cidades</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group row" id="formCadastroCidades" enctype="multipart / form-data">
            <input name="nome" type="text" class="form-control" placeholder="Nome" required>
            <br>
            <br>
            <input name="cep" type="text" class="form-control" placeholder="CEP" required>
            <br>
            <br>
            <select class="form-control" id="estado" name="uf" required>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG" selected>Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
                <option value="EX">Estrangeiro</option>
          </select>
          <br>
          <br>
            <div style="text-align:center;width:100%;">
               <input id="img" name="img" type="file" accept="image/*">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="btnCadastrarCidade" form="formCadastroCidades">Cadastrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Cadastrar produtores-->
<div class="modal fade" id="modalCadastraProdutores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de produtores</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group row" id="formCadastroProdutores" enctype="multipart / form-data">
            <input name="nome" type="text" class="form-control" placeholder="Nome" required>
            <br>
            <br>
            <input name="nomeSocial" type="text" class="form-control" placeholder="Nome Social" required>
            <br>
            <br>
            <input name="whatsapp" type="text" class="form-control" placeholder="WhatsApp" required>
            <br>
            <br>
            <select name="idCidade" id="cidadeProdutor" class="form-control" placeholder="Cidade">
              <option selected disabled>Cidade</option>

            </select>
            <br>
            <br>
            <input name="endereco" type="text" class="form-control" placeholder="Endereço" required>
            <br>
            <br>
            <input name="formaPagamento" type="text" class="form-control" placeholder="Forma de pagamento" required>
            <br>
            <br>
            <input name="formaEntrega" type="text" class="form-control" placeholder="Forma de entrega" required>
            <br>
            <br>
            <select name="idTipo" id="categoriaProdutor" class="form-control">
              <option selected disabled>Categoria</option>

            </select>
            <br>
            <br>
            <textarea name="descricao" class="form-control" placeholder="Quais categorias vende"></textarea>
            <br>
            <br>
            <br>
            <div style="text-align:center;width:100%;">
            <br>
               <input id="imgProdutor" type="file" accept="image/*">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="btnCadastrarProdutor" type="submit" class="btn btn-primary" form="formCadastroProdutores">Cadastrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Cadastrar tipos-->
<div class="modal fade" id="modalCadastraTipos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de tipos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group row" id="formCadastroTipos">
            <input type="text" class="form-control" placeholder="Nome" required>
            <br>
            <br>
            <textarea id="" class="form-control" placeholder="Quais categorias vende"></textarea>

            <div style="text-align:center;width:100%;">
            <br>
               <input type="file" accept="image/*">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" form="formCadastroTipos">Cadastrar</button>
      </div>
    </div>
  </div>
</div>

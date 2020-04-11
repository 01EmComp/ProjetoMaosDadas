<div class="container adminstracaoContainer">
  <div class="card" id="cardInicio" >
    <h5 class="card-header">Administração</h5>
    <div class="card-body">
      <h5 class="card-title">Gerencie os principais componentes do sistema</h5>
      <p class="card-text">
        Voce atualmente pode: <br>
        <ul style="padding-left:20px;">
          <li>
            Cadastrar, editar e excluir Cidades
          </li>
          <li>
            Cadastrar, editar e excluir Compradores
          </li>
          <li>
            Cadastrar, editar e excluir Categorias/Tipos
          </li>
        </ul> 
      </p>
    </div>
  </div>
  
  
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
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastro de produtores</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-group" id="formCadastroProdutores" enctype="multipart / form-data">
            
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputNomeCadastrarProdutor">Nome</label>
                <input id="inputNomeCadastrarProdutor" name="nome" type="text" class="form-control" placeholder="Nome" required>
              </div >
              <div class="form-group col-md-6">
                <label for="inputNomeSocialCadastrarProdutor">Nome Social</label>
                <input id="inputNomeSocialCadastrarProdutor" name="nomeSocial" type="text" class="form-control" placeholder="Nome Social" required>
              </div>
            </div>
            
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputWhatsappCadastrarProdutor">WhatsApp</label>
                <input id="inputWhatsappCadastrarProdutor" name="whatsapp" type="text" class="form-control" placeholder="WhatsApp" required>
              </div>
              <div class="form-group col-md-6">
                <label for="idCidadeCadastrarProdutor">Cidade</label>
                <select name="idCidade" id="idCidadeCadastrarProdutor" class="form-control cidade" placeholder="Cidade">
                  <option disabled selected>Cidade</option>
                </select>
              </div>
            </div>
            
            <div class="form-group">
              <label for="inputEnderecoCadastrarProdutor">Endereco</label>
              <input id="inputEnderecoCadastrarProdutor" name="endereco" type="text" class="form-control" placeholder="Endereço" required>
            </div>
            
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputFormPagamentoCadastrarProdutor">Forma de pagamento</label>
                <input id="inputFormPagamentoCadastrarProdutor" name="formaPagamento" type="text" class="form-control" placeholder="Forma de pagamento" required>
              </div>
              <div class="form-group col-md-4">
                <label for="inputFormaEntregaCadastrarProdutor">Forma de entrega</label>
                <input id="inputFormaEntregaCadastrarProdutor" name="formaEntrega" type="text" class="form-control" placeholder="Forma de entrega" required>
              </div>
              <div class="form-group col-md-4">
                <label for="inputCategoriaCadastrarProdutor">Categoria</label>
                <select name="idTipo" id="categoriaProdutor" class="form-control categoria">
                  <option selected disabled>Categoria</option>
                </select>
              </div>
            </div>
            
            
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputKeywordsCadastrarProdutor">Palavras chaves</label>
                <input id="inputKeywordsCadastrarProdutor" name="keywords" type="text" class="form-control" placeholder="Palavras chaves" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputDescricaoCadastrarProdutor">Descricao</label>
                <textarea id="inputDescricaoCadastrarProdutor" name="descricao" class="form-control" placeholder="Quais categorias vende"></textarea>
              </div>
            </div>
            
            <div class="form-group">
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
          <h5 class="modal-title" id="exampleModalLabel">Cadastro de categorias</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-group row" id="formCadastroCategorias">
            <input type="text" name="nome" class="form-control" placeholder="Nome" required>
            <br>
            <br>
            <textarea name="keywords" class="form-control" placeholder="Quais categorias vende"></textarea>
            
            <div style="text-align:center;width:100%;">
              <br>
              <input id="imgCategorias" type="file" accept="image/*">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button id="btnCadastrarCategorias" type="submit" class="btn btn-primary" form="formCadastroCategorias">Cadastrar</button>
        </div>
      </div>
    </div>
  </div>
  
  
  
  <!-- Modal Seleciona Cidade para Editar-->
  <div class="modal fade" id="modalEditaCidade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Seleciona Cidade</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-group row" id="formSelecionaCidadeEditar">
            <select name="idCidade" id="cidadeEditar" class="form-control cidade" placeholder="Cidade">
              <option selected disabled>Cidade</option>
            </select>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" form="formSelecionaCidadeEditar">Selecionar</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal Seleciona Cidade para apagar-->
  
  <div class="modal fade" id="modalApagaCidade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apagar Cidade</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-group row" id="formSelecionaCidadeApagar">
            <select name="idCidade" id="CidadeApagar" class="form-control cidade" placeholder="Cidade">
              <option selected disabled>Cidade</option>
            </select>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" form="formSelecionaCidadeApagar">Selecionar</button>
        </div>
      </div>
    </div>
  </div>
  
  
  
  <!-- Modal Selciona produtor para Editar-->
  <div class="modal fade" id="modalEditaProdutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Seleciona Produtor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-group row" id="formSelecionaProdutorEditar">
            <select name="idCidade" id="cidadeProdutorEditar" class="form-control cidade" placeholder="Cidade">
              <option selected disabled>Cidade</option>
            </select>
            <br>
            <br>
            <select required name="idProdutor" id="IdProdutorEditar" class="form-control" placeholder="Produtor">
              <option selected disabled>Produtor</option>
            </select>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" form="formSelecionaProdutorEditar">Selecionar</button>
        </div>
      </div>
    </div>
  </div>
  
  
<!--Sesciona produtor para apgar-->  
  <div class="modal fade" id="modalApagaProdutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apagar Produtor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-group row" id="formSelecionaProdutorApagar">
            <select name="idCidade" id="cidadeProdutorApagar" class="form-control cidade" placeholder="Cidade">
              <option selected disabled>Cidade</option>
            </select>
            <br>
            <br>
            <select required name="idProdutor" id="IdProdutorApagar" class="form-control" placeholder="Produtor">
              <option selected disabled>Produtor</option>
            </select>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" form="formSelecionaProdutorApagar">Selecionar</button>
        </div>
      </div>
    </div>
  </div>
  
  <!--Seleciona categoria para editar-->
  <div class="modal fade" id="modalEditaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Seleciona Categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-group row" id="formSelecionaCategoriaEditar">
            <select required name="idCategoria" id="CategoriaEditar" class="form-control categoria" placeholder="Categoria">
              <option selected disabled>Categoria</option>
            </select>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" form="formSelecionaCategoriaEditar">Selecionar</button>
        </div>
      </div>
    </div>
  </div>
  
  
  <!--Seleciona categoria para apagar-->
  
  <div class="modal fade" id="modalApagaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apagar Categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-group row" id="formSelecionaCategoriaApagar">
            <select required name="idCategoria" id="CategoriaApagar" class="form-control categoria" placeholder="Categoria">
              <option selected disabled>Categoria</option>
            </select>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" form="formSelecionaCategoriaApagar">Selecionar</button>
        </div>
      </div>
    </div>
  </div>
  
  
  
  <div class="EditarPodutor" id="EditarProdutor" hidden="hidden">
    <form class="form-group" id="formEditarProdutor" enctype="multipart / form-data" disabled>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputNomeEditarProdutor">Nome</label>
          <input id="inputNomeEditarProdutor" name="nome" type="text" class="form-control" placeholder="Nome" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputNomeSocialEditarProdutor">Nome Social</label>
          <input id="inputNomeSocialEditarProdutor" name="nomeSocial" type="text" class="form-control" placeholder="Nome Social" required>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputWhatsappEditarProdutor">WhatsApp</label>
          <input id="inputWhatsappEditarProdutor" name="whatsapp" type="text" class="form-control" placeholder="WhatsApp" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputCidadeEditarProdutor">Cidade</label>
          <select name="idCidade" id="inputCidadeEditarProdutor" class="form-control cidade" placeholder="Cidade">
          </select>
        </div>
      </div>
      
      <div class="form-group">
        <label for="inputEnderecoEditarProdutor">Endereco</label>
        <input id="inputEnderecoEditarProdutor" name="endereco" type="text" class="form-control" placeholder="Endereço" required>
      </div>
      
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputFormPagamentoEditarProdutor">Forma de pagamento</label>
          <input id="inputFormPagamentoEditarProdutor" name="formaPagamento" type="text" class="form-control" placeholder="Forma de pagamento" required>
        </div>
        <div class="form-group col-md-4">
          <label for="inputFormaEntregaEditarProdutor">Forma de entrega</label>
          <input id="inputFormaEntregaEditarProdutor" name="formaEntrega" type="text" class="form-control" placeholder="Forma de entrega" required>
        </div>
        <div class="form-group col-md-4">
          <label for="inputCategoriaEditarProdutor">Categoria</label>
          <select name="idTipo" id="inputCategoriaEditarProdutor" class="form-control categoria">
          </select>
        </div>
      </div>
      
      
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputKeywordsEditarProdutor">Palavras chaves</label>
          <input id="inputKeywordsEditarProdutor" name="keywords" type="text" class="form-control" placeholder="Palavras chaves" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputDescricaoEditarProdutor">Descricao</label>
          <textarea id="inputDescricaoEditarProdutor" name="descricao" class="form-control" placeholder="Quais categorias vende"></textarea>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group col-md-6" >
          <img src="" alt="" id="imgProdutorEditar">
        </div>
        <div class="form-group col-md-6">
          <label for="inputImgEditarProdutor">Imagem</label>
          <input id="inputImgEditarProdutor" type="file" accept="image/*">
        </div>
      </div>
      
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" id="btnEditarProdutor">
          Salvar
        </button>
      </div>
    </form>
  </div>
  
  
  <div class="EditarCidade mx-auto bg-light" id="EditarCidade" hidden="hidden">
    <form class="form-group row" id="formEditarCidade" enctype="multipart / form-data" style="padding:30px;">
      <p class="text-center">Editar Cidade</p>
      <input id="inputNomeEditarCidade" name="nome" type="text" class="form-control" placeholder="Nome" required>
      <br>
      <br>
      <input id="inputCepEditarCidade" name="cep" type="text" class="form-control" placeholder="CEP" required>
      <br>
      <br>
      <select id="inputUfEditarCidade" class="form-control" id="estado" name="uf" required>
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
      <div class="row" style="text-align:center;width:100%;">
        <div class="col mx-auto">
          <img id="imgEditarCidade" src="" alt="Imagem Anterior" style="width:300px;height=:218px;">
        </div>
        <div class="col mx-auto">
          <input id="inputImgEditarCidade" name="img" type="file" accept="image/*">
        </div>
      </div>
      <div class="mx-auto" style="width:80%;">
        <button style="margin:20px;" type="submit" class="btn btn-primary btn-block" id="btnEditarCidade">
          Salvar
        </button>
      </div>
    </form>
  </div>
  
  <div class="EditarCategoria mx-auto bg-light" id="EditarCategoria" hidden="hidden">
    <form class="form-group row" id="formEditarCategoria" enctype="multipart / form-data" style="padding:30px;">
      <p class="text-center">Editar Categoria</p>
      <input id="inputNomeEditarCategoria" name="nome" type="text" class="form-control" placeholder="Nome" required>
      <br>
      
      <input id="inputKeywordsEditarCategoria" name="keywords" type="text" class="form-control" placeholder="Descrição" required>
      <br>
      <br>
      
      <div class="row" style="text-align:center;width:100%;">
        <div class="col mx-auto">
          <img id="imgEditarCategoria" src="" alt="Imagem Anterior" style="width:300px;height=:218px;">
        </div>
        <div class="col mx-auto">
          <input id="inputImgEditarCategoria" name="img" type="file" accept="image/*">
        </div>
      </div>
      <div class="mx-auto" style="width:80%;">
        <button style="margin:20px;" type="submit" class="btn btn-primary btn-block" id="btnEditarCategoria">
          Salvar
        </button>
      </div>
    </div>
  </div>
</div>
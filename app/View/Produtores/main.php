<div class="produtores-container">
  <div class="row">
    <div class="col-lg-3">
     <div class="card" id="card-categoria">
      <div class="card-head">
      <button class="navbar-toggler" type="button" data-toggle="collapse"
       data-target="#categorias"  aria-expanded="true" aria-label="Alterna navegação">
        <h1  style="width: 100%; margin: auto; align-items: center;text-align: center;">Categorias:</h1>
        <span class="navbar-toggler-icon"></span>
      </button>
      </div>
      <div class="card-body" id="categorias">
        <div class="list-group">
          <a href="" class="list-group-item">Legumes, frutas e hortaliças</a>
          <a href="" class="list-group-item">Padaria, doces e salgados</a>
          <a href="" class="list-group-item">Bebidas e laticiníos</a>
          <a href="" class="list-group-item">Carnes e Ovo</a>
          <a href="" class="list-group-item">Produtos e serviços</a>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-9" style="background-color: #fff">
    <div style="border: #000;">
      <h1 class="my-4"><?=$this->getNomeTipo()?></h1>
    </div>
    <div class="list-group">
     <div class="row">
      <?=$this->selectProdutores()?>
    </div>
  </div>
</div>
</div>


<!-- Modal Detalhes do produtor-->
<div class="modal fade" id="modalProdutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalHead"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalBody">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn" style="width:50%">
          <img style="width:100%; height:100%" src="<?=DIRIMG?>wpp.png" alt="">
        </button>
      </div>
    </div>
  </div>
</div>

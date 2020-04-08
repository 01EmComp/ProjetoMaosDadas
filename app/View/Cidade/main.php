<div class="city-container">
  <div class="row">
    <div class="col-lg-3">
    <div class="card" id="card-categoria" style="margin-bottom:10px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse"
       data-target="#categorias"  aria-expanded="true" aria-label="Alterna navegação">
        <h4  style="width: 100%; margin: auto; align-items: center;text-align: center;">Filtrar por categoria:</h4>
        <span class="navbar-toggler-icon"></span>
      <div class="card-head">
      </div>
      </button>
      <div class="card-body collapse show" id="categorias">
        <div class="list-group">
         <?=$this->getMenu()?>
        </div>
      </div>
    </div>
  </div>
  <!-- /.col-lg-3 -->
  <div class="col-lg-9">
    <div class="card">
      <div class="card-head">
        <h2 style="width: 100%; margin: 4px 22px; align-items: center;text-align: left;"> 
        <?=$this->getNomeCidade()?>
      </h2>
    </div>
    <div class="card-body">
      <div class="row" id="produtoresContainer">
        <?=$this->getProdutores()?>
      </div>
    </div>
  </div>
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
      <div class="modal-footer" id="modalFoot">
      </div>
    </div>
  </div>
</div>

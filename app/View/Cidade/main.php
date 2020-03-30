<div class="city-container">

  <div class="row">

    <div class="col-lg-3">

     <div class="card">
      <div class="card-head">
        <h1  style="width: 100%; margin: auto; align-items: center;text-align: center;">Categorias:</h1>
      </div>
      <div class="card-body">
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
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">
    <div class="card">
      <div class="card-head">
        <h2 style="width: 100%; margin: 4px 22px; align-items: center;text-align: left;"> 
        <?=$this->getNomeCidade()?>
      </h2>
    </div>
    <div class="card-body">
      <div class="row" style="background-color: #fff;">
        <?=$this->tips($this->getIdCidade())?>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
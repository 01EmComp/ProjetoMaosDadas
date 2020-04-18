<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="<?=DIRPAGE?>administracao">Projeto Mãos Dadas <span id="name">Administração</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cidades
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalCadastraCidades" id="cidadeCadastrar">Cadastrar</a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalEditaCidade">Editar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#modalApagaCidade">Apagar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Produtores
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" id="btncadastraProdutor"
           data-target="#modalCadastraProdutores">Cadastrar</a>
          <a class="dropdown-item" href="#" data-toggle="modal" id="btnEditaProdutor"
           data-target="#modalEditaProdutor">Editar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalApagaProdutor">Apagar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Categoria
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalCadastraTipos">Cadastrar</a>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalEditaCategoria">Editar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"  data-toggle="modal" data-target="#modalApagaCategoria">Apagar</a>
        </div>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=DIRPAGE?>">
            Inicio
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=DIRPAGE?>about">Sobre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=DIRPAGE?>/session/logout">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

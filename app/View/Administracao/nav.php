<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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
          <a class="dropdown-item" href="#">Editar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Apagar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Produtores
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" id="btncadastraProdutor"
           data-target="#modalCadastraProdutores">Cadastrar</a>
          <a class="dropdown-item" href="#">Editar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Apagar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Tipos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalCadastraTipos">Cadastrar</a>
          <a class="dropdown-item" href="#">Editar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Apagar</a>
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
      </ul>
    </div>
  </div>
</nav>

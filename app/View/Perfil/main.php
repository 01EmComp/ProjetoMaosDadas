<div class="row" style="margin: 0; padding:0;">
    <div class="col-md-3 bg-light w-100 h-100" style="padding: 0; min-width:320px;">
        <div class="barraLateral">
            <div class="nav-container">
                <nav class="navbar navbar-dark bg-success d-block">
                    <a class="navbar-brand" href="<?= DIRPAGE ?>"><img src="<?= DIRIMG ?>Logo-projeto.png" width="150" height="50"></a>
                    <button class="navbar-toggler float-right mt-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= DIRPAGE ?>">
                                    <h5><i class="fas fa-home navbarIcons"></i> Início</h5><span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <h5><i class="fas fa-info navbarIcons"></i> Sobre</h5>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= DIRPAGE ?>contato">
                                    <h5><i class="fa fa-envelope navbarIcons"></i> Contato</h5>
                                </a>
                            </li>
                        </ul>
                        <button class="btn btn-outline-danger my-2 my-sm-0 btn-lg" id="btnUserLogout" >
                            <i class="fas fa-sign-out-alt"></i> Sair
                        </button>
                    </div>
                </nav>
            </div>
            <div class="card w-100 d-none" id="cardUser">
                <div class="card-body cardBody animated fadeIn slow">
                    <div class="row w-100">
                        <div class="col-3 col3">
                            <i class="fa fa-user-circle icon" id="userIcon"></i>
                        </div>
                        <div class="col-8 col9">
                            <p id="nome-produtor" class="text-left align-middle nomeUser">
                                <?= $_SESSION['nome'] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <ul class="list-group animated fadeIn slower d-none" id="userActions">
                    <li class="list-group-item item" data-option="negocio">
                        <i class="fa fa-clipboard-list icon"></i>
                        <p>
                            Negócio
                        </p>
                        <i class="fa fa-angle-double-right icon align-middle animated"></i>
                    </li>
                    <li class="list-group-item item" data-option="dashboard">
                        <i class="fa fa-tachometer-alt icon"></i>
                        <p>
                            Dashboard
                        </p>
                        <i class="fa fa-angle-double-right icon align-middle animated"></i>
                    </li>
                    <li class="list-group-item item" data-option="informacoes">
                        <i class="fa fa-info-circle icon"></i>
                        <p>
                            Informações
                        </p>
                        <i class="fa fa-angle-double-right icon align-middle animated"></i>
                    </li>
                    <li class="list-group-item item" data-option="destaques">
                        <i class="fa fa-plus-circle icon"></i>
                        <p>
                            Destaques
                        </p>
                        <i class="fa fa-angle-double-right icon align-middle animated"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9 resposiveContainer">
        <div id="responsiveContainer">
        </div>
    </div>
</div>

<div class="d-none" id="load">
    <div class="w-100 d-flex justify-content-center loader">
        <div class="my-auto">
            <div class="spinner-border text-success" role="status">
                <span class="sr-only">Carregando...</span>
            </div>
        </div>
    </div>
</div>
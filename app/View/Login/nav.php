<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="<?= DIRPAGE ?>"><img src="<?= DIRIMG ?>Logo-projeto.png" width="150" height="50"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= DIRPAGE ?>">
                        <h5><i class="fas fa-home"></i> Início</h5><span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= DIRPAGE ?>sobre">
                        <h5><i class="fas fa-info"></i> Sobre</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= DIRPAGE ?>contato">
                        <h5><i class="fas fa-envelope"></i> Contato</h5>
                    </a>
                </li>
            </ul>
            <button disabled href="<?= DIRPAGE ?>login" class="btn btn-light my-2 my-sm-0 btn-lg " type="submit">
                <i class="fas fa-user"></i>
                Área do Fornecedor
            </button>
        </div>
    </nav>
</header>
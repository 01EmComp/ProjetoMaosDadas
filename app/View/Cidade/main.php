<div class="container-fluid mt-4">
    <div class="row" id="rowPrincipal">
        <div class="col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" id="home"></li>
                <li class="breadcrumb-item" id="nomeCidade"></li>
                <li class="breadcrumb-item active" id="categoria">
                    Todos
                </li>
            </ol>

        </div>
    </div>

    <div class="row">
        <div class="col-md-3" style="position:sticky; top:0; z-index:1020;">
            <div id="topo" >
                <div id="menu">
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <center>
                <div class="lds-ring d-none" id="load">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </center>
            <span class="row" id="cards"></span>
        </div>
    </div>
    <div id="menuModal">
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="nomeTitulo"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="conteudo">
                    </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <button style="z-index:1060;" onClick="scrolToTop(body)" class="btn btn-posicao btn-dark float-right mr-3">
        <i class="fas fa-chevron-circle-up"></i>
    </button>

    <input type="hidden" name="idCidade" value="<?= $this->getIdCidade() ?>" id="city" />
</div>
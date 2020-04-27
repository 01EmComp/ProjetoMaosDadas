<div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 col-sm-3">
                <ol class="breadcrumb" id="nomeCidade"></ol>
            </div>
            <div class="col-sm-9">
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-3">
                <div id="topo">
                    <ul class="list-group mt-2 mb-2 mr-2 ml-2" id="minhaLista">
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
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

        <a href="#topo" type="button" class="btn btn-posicao btn-dark float-right mr-3"><i class="fas fa-chevron-circle-up"></i></a>
        
        <input type="hidden" name="idCidade" value="<?=$this->getIdCidade()?>" id="city"/>
    </div>
    
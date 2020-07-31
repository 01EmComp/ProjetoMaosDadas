$(document).ready(async function () {

    var phpssid = getPhpSessionID();
    sessionStorage.setItem('phpssid', phpssid);

    //quando um data option é clicado
    $("[data-option]").click(function (e) {
        //remove todas as classes active dos .item

        //adciona active ao que data-option que disparou o evento
        if (!$(e.currentTarget).hasClass('active')) {
            $(".item").removeClass("active");
            $(e.currentTarget).addClass('active');
            //salva a opção que disparou o evento
            var opt = e.currentTarget.dataset.option;
            //chama a função que foi presetada pelo evento
            $.main.call(opt);
        }

    });

    //$("#userIcon").ready(function () {
    //console.log('carregou');
    $("#cardUser").removeClass('d-none');
    $("#userActions").removeClass('d-none');

    // });

});


$.main = {
    negocio: function () {
        $.ajax({
            url: urlRequisicao + 'api/verNegocio/' + localStorage.getItem('phpssid'),
            beforeSend: function () {
                $("#load").removeClass('d-none');

            },
            success: function (resposta) {
                if (resposta.success) {
                    renderNegocioContainer(resposta.data);
                }
                else {
                    renderCadastroNegocioLayout();
                }
                $("#load").addClass('d-none');
            }
        });
    },
    dashboard: function () {
        alert('b');
    },
    informacoes: function () {
        alert('c');
    },
    destaques: function () {
        alert('c');
    },
    call: function (func, arg) {
        $.main[func](arg);
        $("#responsiveContainer").html("");
    }
};

async function renderNegocioContainer(negocio) {
    alert("entro");
}

async function renderCadastroNegocioLayout() {

    // carrega o formulaário na div responsiveContainer ///calback preenche automaticamente os inputs
    $("#responsiveContainer").load(urlRequisicao + '/app/View/Perfil/Negocio/form.html #formCadastraNegocio',
        function () {
            $("[data-form]").ready(async function () {
                //preenche os campos se os dados estiverem no localstorage
                await setInputsValues();
                await $("[data-form]").change(function (e) {
                    var item = e.currentTarget.dataset.form;
                    var value = $(e.currentTarget).val();
                    //console.log($(e.currentTarget));
                    localStorage.setItem(item, value);
                });
                loadSelects();
                await $("#formCadastraNegocio").submit(async (e) => {
                    await e.preventDefault();
                    var dados = $("#formCadastraNegocio").serializeArray();
                    console.log(urlRequisicao + '/api/cadastroNegocio/' + sessionStorage.getItem('phpssid'));
                    $.ajax({
                        url: urlRequisicao + '/api/cadastroNegocio/' + sessionStorage.getItem('phpssid'),
                        type: 'POST',
                        data: dados,
                        beforeSend: function () {
                            $("#responsiveContainer").addClass('d-none');
                            $("#load").removeClass('d-none');
                        },
                        success: function (response) {
                            console.log(response);
                            $("#responsiveContainer").removeClass('d-none');
                            $("#load").addClass('d-none');
                        }

                    })
                });
            });
        }
    );
    scrolToTop('#responsiveContainer');
}
async function setInputsValues() {
    await $("[data-form]").each(async function () {
        if ($(this).prop("tagName") != 'SELECT') {
            $(this).val(localStorage.getItem($(this).data("form")));
        }
    });
}

$("#btnUserLogout").click(function () {
    $.ajax({
        url: urlRequisicao + "session/logout",
        method: "post",
        success: function (resposta) {

            window.location.assign(urlRequisicao);
        }
    }
    )
})
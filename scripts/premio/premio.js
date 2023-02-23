$(".click2").on("click", function () { // Quando o elemento do id "click" é clicado...
    var nome = $("#nome").val().toString()
    var registro = $("#registro").val()
    var nasci = $("#nascimento").val().toString().split("-")
    var nascimento = nasci[2] + "/" + nasci[1] + "/" + nasci[0];


    if (nome == "" || registro == "" || ($("#nascimento").val().toString() == "" || $("#nascimento").val().toString() == null || $("#nascimento").val().toString() == undefined)) {
        alert("Informação invalida!");
    } else {
        window.location.href = "/scripts/premio/cadastrar.php?nome=" + nome + "&registro=" + registro + "&nascimento=" + nascimento;
    }
});

$(".click3").click(function () { // Quando o elemento do id "click" é clicado...
    var dataIni = $("#inicio").val().toString().split("-")
    var dataInicio = dataIni[2] + "/" + dataIni[1] + "/" + dataIni[0];
    var dataF = $("#fim").val().toString().split("-")
    var dataFim = dataF[2] + "/" + dataF[1] + "/" + dataF[0];
    if ((dataInicio == "" || dataInicio == null) || (dataFim == "" || dataFim == null)) {
        alert("Informação invalida!");
    } else {
        window.location.href = "/scripts/premio/cesta.php?inicio=" + dataInicio + "&fim=" + dataFim;
    }
});

$('#selecionar-todos').click(function (event) {
    if (this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function () {
            this.checked = true;
        });
    } else {
        $(':checkbox').each(function () {
            this.checked = false;
        });
    }
});

$(function () {
    $("#tabela input").keyup(function () {
        var index = $(this).parent().index();
        var nth = "#tabela td:nth-child(" + (index + 1).toString() + ")";
        var valor = $(this).val().toUpperCase();
        $("#tabela tbody tr").show();
        $(nth).each(function () {
            if ($(this).text().toUpperCase().indexOf(valor) < 0) {
                $(this).parent().hide();
            }
        });
    });
});

function exclregistro(e) {
    var valor = e.value
    $("click", function () {
        resultado = confirm("Deseja excluir o registro " + valor)
        if (resultado == true) {
            window.location.href = "/scripts/premio/excluir.php?exclregistro=" + valor;
        } else {
            alert("Operação cancelada");
        }
    })
}

$('#reset').on("click", function () {
    var resetSenha = $('.resetSenha').val()
    if (resetSenha != '') {
        var data = new FormData();
        data.append('resetSenha', resetSenha)
        $.ajax({
            url: './scripts/premio/cadastrar.php',
            data: data,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                // alert('Senha resetada!')
                alert(data)
                // location.reload()
                $('.resetSenha').val("")
            },
            error: function (e) {
                alert(e)
            }
        })
    } else {
        alert('Campo Vazio.')
    }

})
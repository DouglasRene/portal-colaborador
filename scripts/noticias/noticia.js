  //Remove campo de noticia
  $("#remoberNoticia").on("click", function() {
    var noticia = $("#noticiaN").val()
    var status = "excluido"

    $.post("./scripts/noticias/noticia.php", {
      status: status,
      visivel: noticia
    }).done(function() {
      window.location.replace("./scripts/noticias/noticia.php");
    }).fail(function() {
      alert("error");
    });
  })

  //Adiciona campo de noticia
  $("#noticia").on("click", function() {
    var noticia = $("#noticiaN").val()
    var status = "adicionado"

    $.post("./scripts/noticias/noticia.php", {
      status: status,
      visivel: noticia
    }).done(function() {
      window.location.replace("./scripts/noticias/noticia.php");
    }).fail(function() {
      alert("error");
    });
  })



  function retornaValor(v) {
    var id = v
    // $("#texto").html($("#conteudoP" + id).text());
    //Upload de conteudo da noticia
    $("#conteudo").on("click", function() { // Quando o elemento do id "click" é clicado...
        var texto = $('#texto').val()
        // var historico = $("#historico").is(":checked") ? "sim" : "nao";
        // alert(historico)
        if (!$('input[name="file"]').val()) {
          var data = new FormData();
          data.append('id', id);
          data.append('conteudo', texto)
          $.ajax({
            url: './scripts/noticias/conteudo.php',
            data: data,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
              // window.location.replace("./scripts/conteudo.php");
              alert('Artigo editado!')
              location.reload(); 
            }
          });
        }
        if ($('input[name="file"]').val()) {
          var data = new FormData();
          data.append('imagem', $('#file')[0].files[0]);
          data.append('id', id);
          data.append('conteudo', texto)
          $.ajax({
            url: './scripts/noticias/conteudo.php',
            data: data,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
              alert('Artigo editado!')
              location.reload();
            }
          });
        }
        // if (historico === "sim") {
        //   if ($('input[name="file"]').val()) {
        //     var data = new FormData();
        //     data.append('imagem', $('#file')[0].files[0]);
        //     data.append('id', id);
        //     data.append('conteudo', texto);
        //     data.append('historico', historico);
        //     $.ajax({
        //         url: './scripts/noticias/conteudo.php',
        //         data: data,
        //         processData: false,
        //         contentType: false,
        //         type: 'POST',
        //         success: function(data) {
        //           // alert(data)
        //           alert('histórico Adicionado!');
        //           location.reload();
        //         }
        //       });
        //     } else {
        //     var imgBanco = id;
        //     var data = new FormData();
        //     data.append('id', id);
        //     data.append('conteudo', texto);
        //     data.append('historico', historico);
        //     data.append('imgBanco', imgBanco);
        //     $.ajax({
        //         url: './scripts/noticias/conteudo.php',
        //         data: data,
        //         processData: false,
        //         contentType: false,
        //         type: 'POST',
        //         success: function(data) {
        //           // alert(data)
        //           alert('histórico Adicionado!');
        //           location.reload();
        //         }
        //       });
        //   }
        // }
    });
  }

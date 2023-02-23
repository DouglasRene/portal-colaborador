<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
    //Verificador de sessão 
    require __DIR__ . "/check.php";
    //Inicia o layout da pagina
    require __DIR__ . "/template/theme.php";
    require("./scripts/noticias/consultaIndex.php");
    require("./scripts/obterConteudo.php"); 
    $texto = new retornaTexto();
    require("./scripts/aniversariantes.php");
    $aniversario = new retornaAniversario();
    ?>
    <link rel="stylesheet" href="/css/magnific-popup.css">
</head>
<body>
    <section class="home-section">
        <div class="text w-100">
            <div class="container1">
                <div class="d-flex justify-content-center pt-3 pb-3" id="visivel6">
                    <div style="width: 35rem; background-color: #F4F5F8;" class="shadow-lg rounded">
                        <span style="float: left;">#<?php $texto->obterData(6) ?></span>
                        <a href="./scripts/noticias/imagemNoticia.php?id=6">
                            <img src="./scripts/noticias/imagemNoticia.php?id=6" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <p class="card-text" id="conteudoP6" style="word-break: break-word;"><?php $texto->obterTexto(6); ?></p>
                            <?php if ($usuario == "adm2" || $usuario == "adm") { ?>
                                <button type="button" id="conteudoT" value="6" onclick="retornaValor(this.value)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 120px;">
                                    Editar
                                </button>
                                <br>
                                <span>Noticia N: 5</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center pt-3 pb-3" id="visivel5">
                    <div style="width: 35rem; background-color: #F4F5F8;" class="shadow-lg rounded">
                        <span style="float: left;">#<?php $texto->obterData(5) ?></span>
                        <a href="./scripts/noticias/imagemNoticia.php?id=5">
                            <img src="./scripts/noticias/imagemNoticia.php?id=5" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <p class="card-text" id="conteudoP5" style="word-break: break-word;"><?php $texto->obterTexto(5); ?></p>
                            <?php if ($usuario == "adm2" || $usuario == "adm") { ?>
                                <button type="button" id="conteudoT" value="5" onclick="retornaValor(this.value)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 100px;">
                                    Editar
                                </button>
                                <br>
                                <span>Noticia N: 4</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center pt-3 pb-3" id="visivel4">
                    <div style="width: 35rem; background-color: #F4F5F8;" class="shadow-lg rounded">
                        <span style="float: left;">#<?php $texto->obterData(4) ?></span>
                        <a href="./scripts/noticias/imagemNoticia.php?id=4">
                            <img src="./scripts/noticias/imagemNoticia.php?id=4" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <p class="card-text" id="conteudoP4" style="word-break: break-word;"><?php $texto->obterTexto(4); ?></p>
                            <?php if ($usuario == "adm2" || $usuario == "adm") { ?>
                                <button type="button" id="conteudoT" value="4" onclick="retornaValor(this.value)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 100px;">
                                    Editar
                                </button>
                                <br>
                                <span>Noticia N: 3</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center pt-3 pb-2" id="visivel3">
                    <div style="width: 35rem; background-color: #F4F5F8;" class="shadow-lg rounded">
                        <span style="float: left;">#<?php $texto->obterData(3) ?></span>
                        <a href="./scripts/noticias/imagemNoticia.php?id=3">
                            <img src="./scripts/noticias/imagemNoticia.php?id=3" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <p class="card-text" id="conteudoP3" style="word-break: break-word;"><?php $texto->obterTexto(3); ?></p>
                            <?php if ($usuario == "adm2" || $usuario == "adm") { ?>
                                <button type="button" id="conteudoT" value="3" onclick="retornaValor(this.value)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 100px;">
                                    Editar
                                </button>
                                <br>
                                <span>Noticia N: 2</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center pt-3 pb-3" id="visivel2">
                    <div style="width: 35rem; background-color: #F4F5F8;" class="shadow-lg rounded">
                        <span style="float: left;">#<?php $texto->obterData(2) ?></span>
                        <a href="./scripts/noticias/imagemNoticia.php?id=2">
                            <img src="./scripts/noticias/imagemNoticia.php?id=2" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <p class="card-text" id="conteudoP2" style="word-break: break-word;"><?php $texto->obterTexto(2); ?></p>
                            <?php if ($usuario == "adm2" || $usuario == "adm") { ?>
                                <button type="button" id="conteudoT" value="2" onclick="retornaValor(this.value)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 100px;">
                                    Editar
                                </button>
                                <br>
                                <span>Noticia N: 1</span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php if ($usuario == "adm2" || $usuario == "adm") { ?>
                    <div class="flex">
                        <label for="noticia">Notícia N:</label>
                        <select id="noticiaN">
                            <option selected></option>
                            <option value="visivel2">Noticia 1</option>
                            <option value="visivel3">Noticia 2</option>
                            <option value="visivel4">Noticia 3</option>
                            <option value="visivel5">Noticia 4</option>
                            <option value="visivel6">Noticia 5</option>
                        </select>
                        <button type="button" id="noticia" class="btn btn-primary mb-4">Adicionar notícia</button>
                        <button type="button" id="remoberNoticia" class="btn btn-danger mb-4">Remover notícia</button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar texto</h5>
                </div>
                <div class="modal-body">
                    <textarea rows="5" style="width: 100%;" maxlength="1000" id="texto"></textarea>
                </div>
                <div class="modal-footer d-flex flex-col bd-highlight">
                    <!-- Form -->
                    <form method='post' class="ml-0 w-100" action='' enctype="multipart/form-data">
                        <input type='file' name='file' id='file' class='form-control'><br>
                    </form>
                    <!-- <div class="historico"></div> -->
                    <div class="mr-5">
                    </div>
                    <div>
                        <button type="button" class="btn btn-success w-100" id="conteudo">Savar</button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php remove(); ?>
    <script src="/css/jquery.magnific-popup.js"></script>
    <script src="./scripts/noticias/noticia.js"></script>
    <script>
        $('.rounded').magnificPopup({
            delegate: 'a', // child items selector, by clicking on it popup will open
            type: 'image'
            // other options 
        });
    </script>
</body>

</html>
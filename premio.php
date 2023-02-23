<?php
session_start();
?>
<?php
$usuario = $_SESSION['usuario'];
if ($usuario == "adm1" || $usuario == "adm") { ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <?php
    require("./scripts/premio/consulta.php");
    require("./scripts/premio/exibirPremio.php");

    ?>

    <head>
        <?php
        //Verificador de sessão
        require __DIR__ . "/check.php";

        //Inicia o layout da pagina
        require __DIR__ . "/template/theme.php";

        ?>
        <script type="text/javascript" src="jquery.js"></script>
    </head>

    <body>
        <section class="home-section1">
            <div class="text w-100">
                <div class="container1 w-100">
                    <table class="w-100 mb-2 mt-3">
                        <tr style="margin: 0px; padding: 5px 0px; height: 60px;">
                            <th style="margin: 0px; padding: 0px; height: 0px;">
                                <span>Atualizar Data da Cesta</span>
                            </th>
                            <th style="margin: 0px; padding: 0px; height: 0px;">
                                <span>Cadastrar Usuário</span>
                            </th>
                            <th style="margin: 0px; padding: 0px; height: 0px;">
                                <span>Lista de registros</span>
                            </th>
                            <th colspan="2" style="margin: 0px; padding: 0px; height: 0px;">
                                <span>Total sim: <span style="color: red;"><?php echo $row1[0]; ?></span></span><br>
                                <span> Total não: <span style="color: red;"><?php echo $row2[0]; ?></span></span><br>
                                <span> Total geral: <span style="color: red;"><?php echo $row3[0]; ?></span></span>
                            </th>
                        </tr>
                        <tr>
                            <th>

                                <span>Data Inicio</span><br>
                                <input id="inicio" type="date" value="<?php echo $inicio; ?>" class="atC" /><br>
                                <span>Data Fim</span><br>
                                <input id="fim" type="date" value="<?php echo $Fim; ?>" class="atC" /><br>
                                <button type="button" class="btn btn-primary click3" style="font-size: 12px; width: 100px;">Atualizar</button>
                            </th>
                            <th>
                                <span>Nome</span><br>
                                <input id="nome" type="text" class="atC" placeholder="Nome" /><br>
                                <span>Registro</span><br>
                                <input id="registro" type="number" class="atC" placeholder="Registro" /><br>
                                <span>Data de nascimento</span><br>
                                <input id="nascimento" type="date" class="atC" /><br>
                                <button type="button" class="btn btn-primary click2" style="font-size: 12px;  width: 100px;">Cadastrar</button>
                            </th>
                            <form action="scripts/premio/atualizarPremio.php" method="POST">
                                <th>
                                    <textarea rows="8" cols="15" maxlength="20000" name="todos"></textarea>
                                </th>
                                <th>
                                    <select name="premio" id="">
                                        <option selected></option>
                                        <option value="S">&nbsp;&nbsp;&nbsp;S&nbsp;&nbsp;&nbsp;</option>
                                        <option value="N">&nbsp;&nbsp;&nbsp;N&nbsp;&nbsp;&nbsp;</option>
                                        <select>
                                </th>
                                <th>
                                    <button style="font-size: 12px;  width: 120px;" type="submit" class="btn btn-success mb-4">Subir Prêmio</button>
                                </th>
                            </form>
                        </tr>
                    </table>
                    <hr>
                    <form action="scripts/premio/atualizarPremio.php" method="POST">
                        <table id="tabela">
                            <thead>                                
                            <!-- <thead> -->
                                <tr style="margin: 0px; padding: 0px; height: 50px;">
                                    <th colspan="5">
                                        <button type="button" class="btn btn-primary" style="margin: 10px; float: right; font-size: 12px;  width: 120px;" data-bs-toggle="modal" data-bs-target="#resetSenha" style="width: 100px;">
                                            Resetar senha
                                        </button>
                                    </th>
                                    <th style="margin: 0px; padding: 0px; height: 50px;">
                                        <button style="margin: 10px; float: right; font-size: 12px;  width: 120px;" type="submit" class="btn btn-success">Subir Prêmio</button>
                                    </th>
                                </tr>
                                <tr style="margin: 0; padding: 0;">
                                    <th style="margin: 0; padding: 0;">
                                        <center>
                                            <p style="margin: 0; padding: 0;">Registro</p>
                                        </center>
                                    </th>
                                    <th style="margin: 0; padding: 0;">
                                        <center>
                                            <p style="margin: 0; padding: 0;">Nome</p>
                                        </center>
                                    </th>
                                    <th colspan="4" style="margin: 0; padding: 0;">
                                        <p style="margin: 0; padding: 0;">Prêmio</p>
                                    </th>

                                </tr>
                                <tr>
                                    <th>
                                        <input class="filtro" type="text" />
                                    </th>
                                    <th>
                                        <input class="filtro" type="text" />
                                        <!-- <input class="filtro" type="text" /> -->
                                    </th>
                                    <th style="width: 140px;">
                                        <input class="filtro" type="text" />
                                    </th>
                                    <th>
                                        <select name="premio" id="">
                                            <option selected></option>
                                            <option value="S">&nbsp;&nbsp;&nbsp;S&nbsp;&nbsp;&nbsp;</option>
                                            <option value="N">&nbsp;&nbsp;&nbsp;N&nbsp;&nbsp;&nbsp;</option>
                                        </select>
                                    </th>
                                    <th>
                                        <center><input style="margin-top: 5px; transform: scale(1.5);" type="checkbox" id="selecionar-todos"></center>
                                    </th>
                                    <th>
                                        <h4>Excluir</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><?php while ($dado = $con->fetch_array()) { ?>
                                        <td><?php echo $dado['userid']; ?></td>
                                        <td><?php echo $dado['nome']; ?></td>
                                        <td colspan=""><?php echo $dado['premio']; ?></td>
                                        <td></td>
                                        <td>
                                            <center><input style='transform: scale(1.5);' type='checkbox' name='iduser[]' value='<?php echo $dado["userid"]; ?>'></center>
                                        </td>
                                        <td>

                                            <button style="border: 0px;" id='click' value='<?php echo $dado["userid"]; ?>' onClick='exclregistro(this)'>
                                                <i class='bx bxs-trash'></i>
                                            </button>
                                        </td>
                                </tr><?php  } ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </section>
        <script type="text/javascript" src="./scripts/premio/premio.js"></script> 
    </body>

    </html>
<?php } else {
    $page = $_SERVER['PHP_SELF'];
    echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    echo "<script>
            window.location='index.php';
           </script>";
}
?>
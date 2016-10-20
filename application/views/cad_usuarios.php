<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'include/inc_head.php'; ?>
        
        <script type="text/javascript">
            $(document).ready(function () {
                jQuery(function ($) {
                    $("#dataNascimento").mask("99/99/9999", {placeholder:"__/__/____"});
                    $("#cpf").mask("999.999.999-99");
                    $("#telefone").mask("(99) 9999-9999");
                });
            });
        </script>
    </head>
    <style>
        body{
            background-color: whitesmoke;
        }

        form{
            padding: 5px;
            padding-top: 50px;
            margin: 0 auto;
        }
    </style>

    <body>

        <?php include 'include/inc_navbarAdmin.php'; ?> 

        <?php include 'include/inc_menuAdmin.php'; ?> 

        <div class="col-sm-10">
            <br />
            <form method="post" action="<?= base_url('usuarios/incluir') ?>" enctype="multipart/form-data">
                
<!--                definição do nivel admin-->
                <input type="hidden" name="nivel" value="2">
                
                <div class="form-group col-sm-12">
                    <label for="nome">Nome Completo:</label>
                    <input type="text" class="form-control" name="nome" id="nome">
                </div>
                <div class="form-group col-sm-8">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control"  name="email" id="email">
                </div>
                <div class="form-group col-sm-4">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" name="senha" id="senha">
                </div>
                <div class="form-group col-sm-4">
                    <label for="dataNascimento">Data de Nascimento:</label>
                    <input type="text" class="form-control" name="dataNascimento" id="dataNascimento">
                </div>
                <div class="form-group col-sm-4">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" name="cpf" id="cpf">
                </div>
                <div class="form-group col-sm-4">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" name="telefone" id="telefone">
                </div>
                <div class="col-sm-8">
                    <button type="submit" class="btn btn-default" style="width: 100%;">Cadastrar</button>
                </div>
                <div class="col-sm-4">
                    <button type="button" id="btn_voltar" class="btn btn-success" style="width: 100%;" onclick="document.location.href = '<?= base_url('usuarios') ?>'">Voltar</button>
                </div>
            </form>
        </div>
    </body>
</html>
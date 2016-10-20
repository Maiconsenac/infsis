<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'include/inc_head.php'; ?>

        <script type="text/javascript">
            $(document).ready(function () {
                jQuery(function ($) {
                    $("#dataNascimento").mask("99/99/9999", {placeholder: "__/__/____"});
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
            margin: 0 auto;
        }
    </style>

    <body>

        <?php include 'include/inc_navbarAdmin.php'; ?> 

        <?php include 'include/inc_menuAdmin.php'; ?> 

        <div class="col-sm-10">
            <h3 style="text-align: center;"> Alterar Usuário </h3>
            <form method="post" action="<?= base_url('usuarios/grava_alteracao') ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $usuarios->id ?>">
                <div class="form-group col-sm-12">
                    <label for="nome">Nome Completo:</label>
                    <input type="text" class="form-control" name="nome" value="<?= $usuarios->nome ?>" id="nome">
                </div>
                <div class="form-group col-sm-8">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control"  name="email" value="<?= $usuarios->email ?>" id="email">
                </div>
                <div class="form-group col-sm-4">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" name="senha" id="senha" value="<?= $usuarios->senha ?>">
                </div>
                <div class="form-group col-sm-4">
                    <label for="dataNascimento">Data de Nascimento:</label>
                    <input type="text" class="form-control" name="dataNascimento" value="<?= $usuarios->dataNascimento ?>" id="dataNascimento">
                </div>
                <div class="form-group col-sm-4">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" name="cpf" value="<?= $usuarios->cpf ?>" id="cpf">
                </div>
                <div class="form-group col-sm-4">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" name="telefone" value="<?= $usuarios->telefone ?>" id="telefone">
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-success" style="width: 100%;">Alterar</button>
                </div>
                <div class="col-sm-12">
                    <br />
                </div>
                <div class="col-sm-12">
                    <button type="button" id="btn_voltar" class="btn btn-info" style="width: 100%;" onclick="document.location.href = '<?= base_url('usuarios') ?>'">Voltar</button>
                </div>
            </form>
        </div>
    </body>
</html>
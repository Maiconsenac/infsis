<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'include/inc_head.php'; ?>
    </head>

    <style>
        body{
            background-color: whitesmoke;
        }
    </style>

    <body>

        <?php include 'include/inc_navbarAdmin.php'; ?> 

        <?php include 'include/inc_menuAdmin.php'; ?> 

        <div class="col-sm-10" style="background-color: white; height: auto;">
            <br />
            <form role="form" class="form" method="post" action="<?= base_url('categorias/grava_alteracao') ?>">
                <input type="hidden" name="id" value="<?= $categorias->id ?>">
                <div class="form-inline">
                    <div class="col-sm-8">
                        <label for="nome">Nome Categoria:</label>
                        <input type="text" class="form-control" name="descricao" id="nome" value="<?= $categorias->descricao ?>" style="width: 80%;">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success" style="width: 100%;">Alterar</button>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" id="btn_voltar" class="btn btn-block btn-warning" style="width: 100%;" onclick="document.location.href = '<?= base_url('categorias') ?>'"> Voltar</button>
                    </div>
                </div>
                <br />
                <br />
                <br />
            </form>
        </div>
    </body>
</html>
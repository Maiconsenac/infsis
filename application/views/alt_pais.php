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
            <form role="form" class="form" method="post" action="<?= base_url('pais/grava_alteracao') ?>">
                <input type="hidden" name="id" value="<?= $pais->id ?>">
                <div class="form-inline">
                    <div class="col-sm-4">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" value="<?= $pais->nome ?>" name="nome" style="width: 80%;">
                    </div>
                    <div class="col-sm-3">
                        <label for="sigla">Sigla:</label>
                        <input type="text" class="form-control" id="sigla" value="<?= $pais->sigla ?>" name="sigla" style="width: 80%;">
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-success" style="width: 100%;">Alterar</button>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" id="btn_voltar" class="btn btn-block btn-warning" style="width: 100%;" onclick="document.location.href = '<?= base_url('pais') ?>'"> Voltar</button>
                    </div>
                </div>
            </form>
            <br />
            <br />
            <br />
        </div>
    </body>
</html>
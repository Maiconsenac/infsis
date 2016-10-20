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
            <form role="form" class="form" method="post" action="<?= base_url('cidade/grava_alteracao') ?>">
                <input type="hidden" name="id" value="<?= $cidade->id ?>">
                <div class="form-inline">
                    <div class="col-sm-7">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" value="<?= $cidade->nome ?>" name="nome" style="width: 85%;">
                    </div>
                    <div class="col-sm-5">
                        <label for="estado">Estado:</label>
                        <select name="idEstado" id="pais" class="form-control" required style="width: 85%;">
                            <option value=""> Selecione ... </option>
                            <?php foreach ($estado as $estados) { ?>
                                <option value="<?= $estados->id ?>" <?= $estados->id == $cidade->idEstado ? 'selected' : '' ?> > <?= $estados->nome ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-12"><br /></div>
                    <div class="col-sm-7"></div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-success" style="width: 100%;">Alterar</button>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" id="btn_voltar" class="btn btn-block btn-warning" style="width: 100%;" onclick="document.location.href = '<?= base_url('cidade') ?>'"> Voltar</button>
                    </div>
                    <div class="col-sm-12"><br /></div>
                </div>
            </form>
            <br />
            <br />
            <br />
        </div>
    </body>
</html>
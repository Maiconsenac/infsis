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
            <form role="form" class="form" method="post" action="<?= base_url('estado/grava_alteracao') ?>">
                <input type="hidden" name="id" value="<?= $estado->id ?>">
                <div class="form-inline">
                    <div class="col-sm-7">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" value="<?= $estado->nome ?>" name="nome" style="width: 80%;">
                    </div>
                    <div class="col-sm-5">
                        <label for="pais">Pais:</label>
                        <select name="idPais" id="pais" class="form-control" required style="width: 85%;">
                            <option value=""> Selecione ... </option>
                            <?php foreach ($pais as $paises) { ?>
                                <option value="<?= $paises->id ?>" <?= $paises->id == $estado->idPais ? 'selected' : '' ?> > <?= $paises->nome ?> (<?= $paises->sigla ?>) </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-12"><br /></div>
                    <div class="col-sm-2">
                        <label for="sigla">Sigla:</label>
                        <input type="text" class="form-control" id="sigla" value="<?= $estado->sigla ?>" name="sigla" style="width: 60%;">
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success" style="width: 100%;">Alterar</button>
                    </div>
                    <div class="col-sm-3">
                        <button type="button" id="btn_voltar" class="btn btn-block btn-default" style="width: 100%;" onclick="document.location.href = '<?= base_url('estado') ?>'"> Voltar</button>
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
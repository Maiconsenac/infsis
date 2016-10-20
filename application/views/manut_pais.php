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
            <form role="form" class="form" method="post" action="<?= base_url('pais/incluir') ?>">
                <div class="form-inline">
                    <div class="col-sm-4">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" style="width: 80%;">
                    </div>
                    <div class="col-sm-3">
                        <label for="sigla">Sigla:</label>
                        <input type="text" class="form-control" id="sigla" name="sigla" style="width: 80%;">
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-success" style="width: 100%;">Cadastrar</button>
                    </div>
                    <div class="col-sm-2">
                        <button type="reset" class="btn btn-danger" style="width: 100%;">Limpar</button>
                    </div>
                </div>
            </form>
            <br />
            <br />
            <br />
            <table class="table table-hover" style="text-align: center;">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Sigla</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pais as $paises) { ?>
                        <tr>
                            <td><?= $paises->id ?></td>
                            <td><?= $paises->nome ?></td>
                            <td><?= $paises->sigla ?></td>
                            <td>
                                <a href="<?= base_url('pais/alterar/' . $paises->id) ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                &nbsp;
                                <a href="<?= base_url('pais/deletar/' . $paises->id) ?>" onclick="return confirm('Deseja excluir o país \' <?= $paises->nome ?> \' ?')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br />
            <div class="row">
                <div class="col-sm-10"></div>
                <div class="col-sm-2">
                    <button type="button" id="btn_voltar" class="btn btn-block btn-default" style="width: 100%;" onclick="document.location.href = '<?= base_url('admin') ?>'"> Voltar</button>
                </div>
            </div>
            <br />
        </div>
    </body>
</html>
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
            <form role="form" class="form" method="post" action="<?= base_url('estado/incluir') ?>">
                <div class="form-inline">
                    <div class="col-sm-4">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" style="width: 80%;">
                    </div>
                    <div class="col-sm-4">
                        <label for="pais">Pais:</label>
                        <select name="idPais" id="pais" class="form-control" required style="width: 85%;">
                            <option value=""> Selecione ... </option>
                            <?php foreach ($pais as $paises) { ?>
                                <option value="<?= $paises->id ?>"> <?= $paises->nome ?> (<?= $paises->sigla ?>) </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="sigla">Sigla:</label>
                        <input type="text" class="form-control" id="sigla" name="sigla" style="width: 60%;">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success" style="width: 100%;">Cadastrar</button>
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
                        <th>País</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($estado as $estados) { ?>
                        <tr>
                            <td><?= $estados->id ?></td>
                            <td><?= $estados->nome ?></td>
                            <td><?= $estados->sigla ?></td>
                            <?php foreach ($pais as $paises) { ?>
                                <?php if ($estados->idPais == $paises->id) { ?>
                                    <td><?= $paises->nome ?> (<?= $paises->sigla ?>)</td>                      
                                <?php } ?>
                            <?php } ?>
                            <td>
                                <a href="<?= base_url('estado/alterar/' . $estados->id) ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                &nbsp;
                                <a href="<?=base_url('estado/deletar/'.$estados->id) ?>" onclick="return confirm('Deseja excluir o estado \' <?= $estados->nome ?> \' ?')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
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
            <form role="form" class="form" method="post" action="<?= base_url('cidade/incluir') ?>">
                <div class="form-inline">
                    <div class="col-sm-5">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" style="width: 85%;">
                    </div>
                    <div class="col-sm-5">
                        <label for="estado">Estado:</label>
                        <select name="idEstado" id="pais" class="form-control" required style="width: 85%;">
                            <option value=""> Selecione ... </option>
                            <?php foreach ($estado as $estados) { ?>
                                <option value="<?= $estados->id ?>"> <?= $estados->nome ?></option>
                            <?php } ?>
                        </select>
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
                        <th>Estado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cidade as $cidades) { ?>
                        <tr>
                            <td><?= $cidades->id ?></td>
                            <td><?= $cidades->nome ?></td>
                            <?php foreach ($estado as $estados) { ?>
                                <?php if ($cidades->idEstado == $estados->id) { ?>
                                    <td><?= $estados->nome ?></td>                      
                                <?php } ?>
                            <?php } ?>
                            <td>
                                <a href="<?= base_url('cidade/alterar/' . $cidades->id) ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                &nbsp;
                                <a href="<?=base_url('cidade/deletar/'.$cidades->id) ?>" onclick="return confirm('Confirma a exclusão de \' <?= $cidades->nome ?> \' ?')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
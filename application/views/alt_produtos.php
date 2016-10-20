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

        form{
            padding: 5px;
            padding-top: 20px;
            margin: 0 auto;
        }
    </style>

    <body>

        <?php include 'include/inc_navbarAdmin.php'; ?> 

        <?php include 'include/inc_menuAdmin.php'; ?> 

        <div class="col-sm-10">
            <br />
            <form method="post" action="<?= base_url('produtos/grava_alteracao') ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $produto->id ?>">
                <div class="form-group col-sm-7">
                    <label for="descricao">Nome:</label>
                    <input type="text" class="form-control" name="descricao" value="<?= $produto->descricao ?>" id="descricao" required>
                </div>
                <div class="form-group col-sm-5">
                    <div class="form-group">
                        <label for="foto">Foto: </label>
                        <input type="file" name="foto" id="foto" class="form-control" 
                               accept=".gif,.jpg,.png">                       
                    </div>
                </div>
                <div class="form-group-sm col-sm-2">
                    <label for="valorCompra">Valor Compra (R$):</label>
                    <input type="text" class="form-control" name="valorCompra" value="<?= $produto->valorCompra ?>" id="valorCompra" required>
                </div>
                <div class="form-group-sm col-sm-2">
                    <label for="valorVenda">Valor Venda (R$):</label>
                    <input type="text" class="form-control" name="valorVenda" value="<?= $produto->valorVenda ?>" id="valorVenda" required>
                </div>
                <div class="form-group-sm col-sm-2">
                    <label for="quantidade">Quantidade:</label>
                    <input type="number" class="form-control" name="quantidade" value="<?= $produto->quantidade ?>" min="0" id="quantidade" required>
                </div>
                <div class="form-group col-sm-12">
                </div>
                <div class="form-horizontal col-sm-6">
                    <label for="marca">Marca:</label>
                    <select name="idMarca" id="marca" class="form-control" required style="width: 100%;">
                        <option value=""> Selecione ... </option>
                        <?php foreach ($marcas as $marca) { ?>
                            <option value="<?= $marca->id ?>" <?= $marca->id == $produto->idMarca ? 'selected' : '' ?> > <?= $marca->descricao ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="categoria">Categoria:</label>
                    <select name="idCategoria" id="categoria" class="form-control" required style="width: 100%;">
                        <option value=""> Selecione ... </option>
                        <?php foreach ($categorias as $categoria) { ?>
                            <option value="<?= $categoria->id ?>" <?= $categoria->id == $produto->idCategoria ? 'selected' : '' ?> > <?= $categoria->descricao ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-12">
                    <br />
                </div>
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-default" style="width: 100%;">Alterar</button>
                </div>
                <div class="col-sm-3">
                    <button type="button" id="btn_voltar" class="btn btn-success" style="width: 100%;" onclick="document.location.href = '<?= base_url('produtos') ?>'">Voltar</button>
                </div>
            </form>
        </div>
    </body>
</html>
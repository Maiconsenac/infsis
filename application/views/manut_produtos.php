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
            <div class="row">
                <div class="col-sm-10"></div>
                <div class="col-sm-2"> 
                    <a href="<?= base_url('produtos/open_new_produtos') ?>" class="btn btn-info btn-link">
                        <span class="glyphicon glyphicon-new-window"></span> Novo Produto
                    </a>
                </div>
            </div>
            <div class="col-sm-12" style="padding: 10px;">
                <form method="post" action="<?= base_url('produtos/pesquisarMarca') ?>">
                    <div class="col-sm-3">
                        <select name="idMarca" id="marca" class="form-control" required style="width: 100%;">
                            <option value=""> Selecione ... </option>
                            <?php foreach ($marcas as $marca) { ?>
                                <option value="<?= $marca->id ?>"> <?= $marca->descricao ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-disabled btn-info"> Filtrar por Marca </button>
                    </div>
                </form>

                <form method="post" action="<?= base_url('produtos/pesquisarCategoria') ?>">
                    <div class="col-sm-3">
                        <select name="idCategoria" id="categoria" class="form-control" required style="width: 100%;">
                            <option value=""> Selecione ... </option>
                            <?php foreach ($categorias as $categoria) { ?>
                                <option value="<?= $categoria->id ?>"> <?= $categoria->descricao ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-disabled btn-info"> Filtrar por Categoria </button>
                    </div>
                </form>
            </div>
            <div class="col-sm-12" style="padding: 10px;">
                <form method="post" action="<?= base_url('produtos/pesquisar') ?>">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pesquisado" placeholder="Item a pesquisar..." id="pesquisado" required>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-default glyphicon glyphicon-search" style="width: 100%;"> Pesquisar </button>
                    </div>
                </form>
            </div>
            <br />
            <?php
            //verifica se existe variavel de sessao

            if ($this->session->has_userdata('mensa')) {

                $mensa = $this->session->flashdata('mensa');
                if ($this->session->flashdata('tipo') == '1') {

                    echo '<div class="alert alert-success">';
                    echo'<strong>Success! </strong>' . $mensa;
                    echo' </div>';
                } else {
                    echo '<div class="alert alert-danger">';
                    echo '<strong>Problema! </strong>' . $mensa;
                    echo' </div>';
                }
            }
            ?>
            <br />
            <table class="table table-hover" style="text-align: center;">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Valor Compra</th>
                        <th>Valor Venda</th>
                        <th>Quantidade</th>
                        <th>Marca</th>
                        <th>Categoria</th>
                        <th>Foto</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto) { ?>
                        <tr>
                            <td><?= $produto->id ?></td>
                            <td><?= $produto->descricao ?></td>
                            <td>R$ <?= number_format($produto->valorCompra, 2, ',', '.') ?></td>
                            <td style="color: red;">R$ <?= number_format($produto->valorVenda, 2, ',', '.') ?></td>
                            <td><?= $produto->quantidade ?></td>
                            <?php
                            foreach ($marcas as $marca) {
                                if ($marca->id == $produto->idMarca) {
                                    ?>     
                                    <td style="color: red;"><?= $marca->descricao ?></td>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            foreach ($categorias as $categoria) {
                                if ($categoria->id == $produto->idCategoria) {
                                    ?>     
                                    <td style="color: red;"><?= $categoria->descricao ?></td>
                                    <?php
                                }
                            }
                            ?>                 
                            <td><img src="<?= base_url() . './fotos/' . $produto->foto ?>" width="160" height="80"></td>
                            <td>
                                <a href="<?= base_url('produtos/alterar/' . $produto->id) ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                &nbsp;
                                <a href="<?= base_url('produtos/deletar/' . $produto->id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Confirma a Exclusão de \' <?= $produto->descricao ?> \' ?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                <br />
                                <br />
                                <a href="" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" ><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Abrir Foto</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-10"></div>
                <div class="col-sm-2">
                    <button type="button" id="btn_voltar" class="btn btn-block btn-default" style="width: 100%;" onclick="document.location.href = '<?= base_url('admin') ?>'"> Voltar</button>
                </div>
            </div>
            <br />
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg" style="width: 100%;">

                    <!-- Modal content-->
                    <div class="modal-content" style="background-color: transparent;">
                        <div class="modal-body">
                            <img class="img-rounded" src="./fotos/<?= $produto->foto ?>" width="100%" height="480" >
                        </div>
                        <div class="modal-footer" style="background-color: whitesmoke;">
                            <button type="button" class="col-sm-12 btn btn-success" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
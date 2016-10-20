<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'include/inc_head.php'; ?>
    </head>
    <script>
        $(document).ready(function () {
            $('img')
                    .wrap('<span style="display:inline-block"></span>')
                    .css('display', 'block')
                    .parent()
                    .zoom();
        });
    </script>
    <style>
        body{
            background-color: whitesmoke;
        }

        #quadroProduto{
            background-color: white;
            text-align: center;
        }

        #foto{
            padding: 5px;
            padding-bottom: 15px;
        }

        #textos{
            text-align: center;
        }

        #menuMeio{
            padding-top: 10px;
            padding-bottom: 30px;
            padding-left: 60px;
            padding-right: 60px;
        }

        #paginas{
            text-align: center;
        }

        ul.pagination {
            display: inline-block;
            padding: 0;
            margin: 0;
        }

        ul.pagination li {display: inline;}

        ul.pagination li a {
            font-family: inherit;
            font-size: 15px;
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
        }

        ul.pagination li a.active {
            background-color: #4CAF50;
            color: white;
        }

        ul.pagination li a:hover:not(.active) {background-color: #ddd;}
    </style>

    <body>

        <?php include 'include/inc_navbarAdmin.php'; ?>  

        <?php include "include/inc_menuAdmin.php" ?>

        <div class="col-sm-10">
            <div class="row" id="menuMeio">
                <?php foreach ($produtos as $produto) { ?>
                    <div class="col-sm-3">
                        <div class="well well-sm" id="quadroProduto">
                            <img src="./fotos/<?= $produto->foto ?>" width="100%" height="200" id="foto">
                            <label id="textoTitulo"><h4><?= $produto->descricao ?></h4></label>
                            <br />
                            <?php
                            foreach ($marcas as $marca) {
                                if ($marca->id == $produto->idMarca) {
                                    ?>     
                                    <label style="color: slategray;"><?= $marca->descricao ?></label>
                                    <?php
                                }
                            }
                            ?>
                            <br />
                            <div class="col-sm-12" id="textos">
                                <label style="color: red;"><h4>R$ <?= number_format($produto->valorVenda, 2, ',', '.') ?></h4></label>
                            </div>
                            <a href="#" id="botoes" type="button" class="btn btn-default btn-disabled" style="width: 100%;">Comprar</a>
                        </div>
                    </div>
                <?php } ?>


            </div>
            <div id="paginas">              
                <ul class="pagination">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a class="active" href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>
            <div class="col-sm-12"><br /><br /><br /></div>
        </div>
    </body>
</html>
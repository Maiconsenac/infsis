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

        <div class="col-sm-12">
            <h3 style="text-align: center">EM CONSTRUÇÃO</h3>
        </div>
    </body>
</html>
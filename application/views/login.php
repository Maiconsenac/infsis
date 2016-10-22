<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title> InfSiS </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>">
        <script src="<?= base_url('bootstrap/js/jquery/1.12.4/jquery.min.js') ?>"></script>
        <script src="<?= base_url('bootstrap/js/bootstrap.min.js') ?>"></script>
    </head>

    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #eee;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .form-signin-heading{
            text-align: center;
        }
    </style>

    <body>

        <div class="container">

            <form class="form-signin" method="post" action="<?= base_url('usuarios/logar') ?>">
                <h2 class="form-signin-heading">Login</h2>
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required autofocus>
                <br />
                <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
               
            </form>

        </div> 

    </body>
</html>
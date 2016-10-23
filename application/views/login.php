<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include 'include/inc_head.php'; ?>
        <link href="<?= base_url('assets/css/signin.css') ?>" rel="stylesheet">
    </head>

    <style>
        .form-style-6{
            font: 95% Arial, Helvetica, sans-serif;
            max-width: 400px;
            margin: 0px auto;
            padding: 0px;
            background: #F7F7F7;
        }
        .form-style-6 #titulo{
            background: #43D1AF;
            padding: 20px 0;
            font-size: 140%;
            font-weight: 300;
            width: 100%;
            text-align: center;
            color: #fff;
            margin: -5px 0px 0px 0px;
        }
        .form-style-6 input[type="text"],
        .form-style-6 input[type="date"],
        .form-style-6 input[type="datetime"],
        .form-style-6 input[type="email"],
        .form-style-6 input[type="number"],
        .form-style-6 input[type="search"],
        .form-style-6 input[type="password"],
        .form-style-6 input[type="time"],
        .form-style-6 input[type="url"],
        .form-style-6 textarea,
        .form-style-6 select 
        {
            -webkit-transition: all 0.30s ease-in-out;
            -moz-transition: all 0.30s ease-in-out;
            -ms-transition: all 0.30s ease-in-out;
            -o-transition: all 0.30s ease-in-out;
            outline: none;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            width: 100%;
            background: #fff;
            margin-bottom: 4%;
            border: 1px solid #ccc;
            padding: 3%;
            color: #555;
            font: 95% Arial, Helvetica, sans-serif;
        }
        .form-style-6 input[type="text"]:focus,
        .form-style-6 input[type="date"]:focus,
        .form-style-6 input[type="datetime"]:focus,
        .form-style-6 input[type="email"]:focus,
        .form-style-6 input[type="number"]:focus,
        .form-style-6 input[type="search"]:focus,
        .form-style-6 input[type="time"]:focus,
        .form-style-6 input[type="url"]:focus,
        .form-style-6 textarea:focus,
        .form-style-6 select:focus
        {
            box-shadow: 0 0 5px #43D1AF;
            padding: 3%;
            border: 1px solid #43D1AF;
        }

        .form-style-6 input[type="submit"],
        .form-style-6 input[type="button"]{
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            width: 100%;
            padding: 3%;
            background: #43D1AF;
            border-bottom: 2px solid #30C29E;
            border-top-style: none;
            border-right-style: none;
            border-left-style: none;    
            color: #fff;
        }
        .form-style-6 input[type="submit"]:hover,
        .form-style-6 input[type="button"]:hover{
            background: #2EBC99;
        }

        .form-style-6 #cadastrar-se {
            -moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
            -webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
            box-shadow: inset 0px 1px 0px 0px #45D6D6;
            background-color: #2CBBBB;
            border: 1px solid #27A0A0;
            display: inline-block;
            cursor: pointer;
            color: #FFFFFF;
            font-family: 'Open Sans Condensed', sans-serif;
            font-size: 14px;
            padding: 8px 18px;
            text-decoration: none;
            text-transform: uppercase;
        }

        .form-style-6 #cadastrar-se:hover {
            background:linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
            background-color:#34CACA;
        }
    </style>

    <body>

        <div class="container">
            <div class="form-style-6">
                <input type="button" id="titulo" onclick="document.location.href = '<?= base_url() ?>'" value="Login"/>
                <form class="form-signin" method="post" action="<?= base_url('usuarios/logar') ?>">
                    <input type="email" name="email" placeholder="E-mail de Acesso" required autofocus/>
                    <input type="password" name="senha" placeholder="Senha" required/>
                    <p>
                        <input type="submit" value="Entrar" />
                    </p>
                    <input id="cadastrar-se" type="button" value="Cadastrar-se" />
                </form>
            </div>
        </div>

    </body>
</html>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url() ?>">Infobyte</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="usuarios/login"><span class="glyphicon glyphicon-user"></span> <?= $this->session->nome ?></a></li>
            <?php if ($this->session->logado) { ?>
                <li><a href="<?= base_url('usuarios/sair') ?>"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
                <?php } ?>
        </ul>
    </div>
</nav>

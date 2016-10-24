<style>
    .menu {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: transparent;
        height: 100%;
        position: fixed;
        overflow: auto;
    }

    li a {
        display: block;
        color: #000;
        padding: 8px 16px;
        text-decoration: none;
    }

    /* Change the link color on hover */
    li a:hover {
        background-color: #555;
        color: white;
    }

    li a.active {
        background-color: #4CAF50;
        color: white;
    }

    li a:hover:not(.active) {
        background-color: #555;
        color: white;
    }

</style>

<div class="col-sm-2">
    <ul class="menu">
        <h3 style="text-align: center;">Administrador</h3>
        <li><a class="active" href="<?= base_url() ?>">Home</a></li>
        <li><a href="<?= base_url('produtos') ?>">Produtos</a></li>
        <li><a href="<?= base_url('categorias') ?>">Categorias</a></li>
        <li><a href="<?= base_url('marcas') ?>">Marcas</a></li>
        <li><a href="<?= base_url('pais') ?>">Pais</a></li>
        <li><a href="<?= base_url('estado') ?>">Estado</a></li>
        <li><a href="<?= base_url('cidade') ?>">Cidade</a></li>
        <li><a href="<?= base_url('itensVenda') ?>">Itens Vendas</a></li>
        <li><a href="<?= base_url('vendas') ?>">Vendas</a></li>
        <li><a href="<?= base_url('usuarios/usuariosAdmin') ?>">Usuários Admin</a></li>
    </ul>
</div>
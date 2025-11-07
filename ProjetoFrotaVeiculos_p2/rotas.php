<?php
    require("cabecalho.php");
    require("conexao.php");

    try{
        $stmt = $pdo->query("SELECT * FROM rota");
        $dados = $stmt->fetchAll();
    } catch(\Exception $e){
        echo "Erro: ".$e->getMessage();
        $dados = []; // Garante que $dados seja um array para não quebrar o foreach
    }

    if (isset($_GET['cadastro']) && $_GET['cadastro']){
        echo "<p class='text-success'>Cadastro realizado!</p>";
    } else if (isset($_GET['cadastro']) && !$_GET['cadastro']){
        echo "<p class='text-danger'>Erro ao cadastrar!</p>";
    }
    if (isset($_GET['editar']) && $_GET['editar']){
        echo "<p class='text-success'>Registro editado!</p>";
    } else if (isset($_GET['editar']) && !$_GET['editar']){
        echo "<p class='text-danger'>Erro ao editar!</p>";
    }
    if (isset($_GET['excluir']) && $_GET['excluir']){
        echo "<p class='text-success'>Registro excluído!</p>";
    } else if (isset($_GET['excluir']) && !$_GET['excluir']){
        echo "<p class='text-danger'>Erro ao excluir! Verifique se o registro está sendo usado em outra parte do sistema.</p>";
    }
?>

<h2>Rotas</h2>
<a href="novo_rota.php" class="btn btn-success mb-3 no-print">Novo Registro</a>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Origem</th>
            <th>Destino</th>
            <th class="no-print">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($dados as $d):
        ?>
        <tr>
            <td><?= $d['id'] ?></td>
            <td><?= $d['cidade_inicio'] ?> / <?= $d['estado_inicio'] ?></td>
            <td><?= $d['cidade_fim'] ?> / <?= $d['estado_fim'] ?></td>
            <td class="d-flex gap-2 no-print">
                <a href="editar_rota.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                <a href="consultar_rota.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
            </td>
        </tr>
        <?php
            endforeach;
        ?>
    </tbody>
</table>

<?php
require("rodape.php");
?>
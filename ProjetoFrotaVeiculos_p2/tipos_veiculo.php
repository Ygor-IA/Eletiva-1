<?php
    require("cabecalho.php");
    require("conexao.php");

    try{
        $stmt = $pdo->query("SELECT * FROM tipo_veiculo");
        $dados = $stmt->fetchAll();
    } catch(\Exception $e){
        echo "Erro: ".$e->getMessage();
    }

    if (isset($_GET['cadastro']) && $_GET['cadastro']){
        echo "<p class='text-success'>Cadastro realizado!</p>";
    } else if (isset($_GET['cadastro']) && !$_GET['cadastro']){
        echo "<p class='text-danger'>Erro ao cadastrar!</p>";
    }
    if (isset($_GET['excluir']) && $_GET['excluir']){
        echo "<p class='text-success'>Registro excluído!</p>";
    } else if (isset($_GET['excluir']) && !$_GET['excluir']){
        echo "<p class='text-danger'>Erro ao excluir! Verifique se o registro está sendo usado em outra parte do sistema.</p>";
    }
?>

<h2>Tipos de Veículo</h2>
<a href="novo_tipo_veiculo.php" class="btn btn-success mb-3 no-print">Novo Registro</a>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th class="no-print">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($dados as $d):
        ?>
        <tr>
            <td><?= $d['id'] ?></td>
            <td><?= $d['nome'] ?></td>
            <td class="d-flex gap-2 no-print">
                <a href="editar_tipo_veiculo.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                <a href="consultar_tipo_veiculo.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
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
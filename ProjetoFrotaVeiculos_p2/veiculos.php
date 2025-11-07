<?php
    require("cabecalho.php");
    require("conexao.php");

    try{
        // Junta veiculo (produto) com tipo_veiculo (categoria)
        $stmt = $pdo->query("SELECT t.nome AS tipo_nome, v.* FROM veiculo v
                            INNER JOIN tipo_veiculo t ON t.id = v.tipo_veiculo_id");
        $dados = $stmt->fetchAll();
    } catch(\Exception $e){
        echo "Erro: ".$e->getMessage();
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
    } else if (isset($_GET['cadastro']) && !$_GET['cadastro']){
        echo "<p class='text-danger'>Erro ao excluir!</p>";
    }
?>

<h2>Veículos</h2>
<a href="novo_veiculo.php" class="btn btn-success mb-3 no-print">Novo Registro</a>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th colspan="5">Dados dos Veículos</th>
            <th class="no-print">
                <button class="btn btn-secondary" onclick="window.print()">
                    Imprimir
                </button>
            </th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Placa</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>Tipo</th>
            <th class="no-print">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($dados as $d):
        ?>
        <tr>
            <td><?= $d['id'] ?></td>
            <td><?= $d['placa'] ?></td>
            <td><?= $d['modelo'] ?></td>
            <td><?= $d['ano'] ?></td>
            <td><?= $d['tipo_nome'] ?></td>
            <td class="d-flex gap-2 no-print">
                <a href="editar_veiculo.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                <a href="consultar_veiculo.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-info">Consultar</a>
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
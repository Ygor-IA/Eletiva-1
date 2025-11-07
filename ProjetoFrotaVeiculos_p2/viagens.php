<?php
    require("cabecalho.php");
    require("conexao.php");

    try{
        $stmt = $pdo->query("
            SELECT 
                vi.id, vi.data_viagem, 
                ve.placa, ve.modelo, 
                m.nome AS motorista_nome, 
                r.cidade_inicio, r.cidade_fim 
            FROM viagem vi
            JOIN veiculo ve ON vi.veiculo_id = ve.id
            JOIN motorista m ON vi.motorista_id = m.id
            JOIN rota r ON vi.rota_id = r.id
            ORDER BY vi.data_viagem DESC
        ");
        $dados = $stmt->fetchAll();
    } catch(\Exception $e){
        echo "Erro: ".$e->getMessage();
    }

    if (isset($_GET['excluir']) && $_GET['excluir']){
        echo "<p class='text-success'>Registro excluído!</p>";
    } else if (isset($_GET['excluir']) && !$_GET['excluir']){
        echo "<p class='text-danger'>Erro ao excluir!</p>";
    }
?>

<h2>Registros de Viagem</h2>
<a href="novo_viagem.php" class="btn btn-success mb-3 no-print">Novo Registro</a>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Data/Hora</th>
            <th>Veículo (Placa/Modelo)</th>
            <th>Motorista</th>
            <th>Rota (Origem/Destino)</th>
            <th class="no-print">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($dados as $d):
        ?>
        <tr>
            <td><?= $d['id'] ?></td>
            <td><?= date('d/m/Y H:i', strtotime($d['data_viagem'])) ?></td>
            <td><?= $d['placa'] ?> / <?= $d['modelo'] ?></td>
            <td><?= $d['motorista_nome'] ?></td>
            <td><?= $d['cidade_inicio'] ?> -> <?= $d['cidade_fim'] ?></td>
            <td class="d-flex gap-2 no-print">
                <a href="editar_viagem.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                <a href="consultar_viagem.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
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
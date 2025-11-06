<?php
    require("cabecalho.php");
    require("conexao.php");

    // Lógica para Excluir (POST)
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id'])){
        $id = $_POST['id'];
        try {
            $stmt = $pdo->prepare("DELETE FROM viagem WHERE id = ?");
            if($stmt->execute([$id])){
                header('location: viagens.php?excluir=true');
            }
        } catch(PDOException $e) {
             header('location: viagens.php?excluir=false');
        }
    }

    // Lógica para Carregar Dados (GET)
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        try{
            // Query complexa para mostrar os nomes, e não apenas os IDs
            $stmt = $pdo->prepare("
                SELECT 
                    vi.id, vi.data_viagem, 
                    CONCAT(ve.placa, ' / ', ve.modelo) AS veiculo_desc, 
                    m.nome AS motorista_nome, 
                    CONCAT(r.cidade_inicio, ' -> ', r.cidade_fim) AS rota_desc
                FROM viagem vi
                JOIN veiculo ve ON vi.veiculo_id = ve.id
                JOIN motorista m ON vi.motorista_id = m.id
                JOIN rota r ON vi.rota_id = r.id
                WHERE vi.id = ?
            ");
            $stmt->execute([$id]);
            $viagem = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$viagem){
                die("Viagem não encontrada!");
            }
             $viagem['data_viagem'] = date('d/m/Y H:i', strtotime($viagem['data_viagem']));

        } catch(Exception $e){
            echo "Erro ao buscar dados: ".$e->getMessage();
        }
    } else {
        die("ID não fornecido!");
    }
?>

<h1>Confirmar Exclusão</h1>
<p>Tem certeza que deseja excluir o seguinte registro de viagem?</p>

<form method="post">
    <input type="hidden" name="id" value="<?= $viagem['id'] ?>">

    <div class="mb-3">
        <label for="data_viagem" class="form-label">Data e Hora</label>
        <input type="text" id="data_viagem" class="form-control" 
               value="<?= $viagem['data_viagem'] ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="veiculo_desc" class="form-label">Veículo</label>
        <input type="text" id="veiculo_desc" class="form-control" 
               value="<?= $viagem['veiculo_desc'] ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="motorista_nome" class="form-label">Motorista</label>
        <input type="text" id="motorista_nome" class="form-control" 
               value="<?= $viagem['motorista_nome'] ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="rota_desc" class="form-label">Rota</label>
        <input type="text" id="rota_desc" class="form-control" 
               value="<?= $viagem['rota_desc'] ?>" disabled>
    </div>

    <a href="viagens.php" class="btn btn-secondary">Voltar</a>
    <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
</form>

<?php
    require("rodape.php");
?>
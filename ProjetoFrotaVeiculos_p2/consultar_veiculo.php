<?php
    require("cabecalho.php");
    require("conexao.php");

    // Lógica para Excluir (POST)
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['id'])){
        $id = $_POST['id'];
        try {
            $stmt = $pdo->prepare("DELETE FROM veiculo WHERE id = ?");
            if($stmt->execute([$id])){
                header('location: veiculos.php?excluir=true');
            }
        } catch(PDOException $e) {
            // Erro de chave estrangeira
            if($e->getCode() == '23000' || $e->errorInfo[1] == 1451) {
                header('location: consultar_veiculo.php?id='.$id.'&erro=constraint');
            } else {
                header('location: veiculos.php?excluir=false');
            }
        }
    }

    // Lógica para Carregar Dados (GET)
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        try{
            $stmt = $pdo->prepare("SELECT v.*, t.nome AS tipo_nome 
                                 FROM veiculo v 
                                 JOIN tipo_veiculo t ON v.tipo_veiculo_id = t.id 
                                 WHERE v.id = ?");
            $stmt->execute([$id]);
            $veiculo = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$veiculo){
                die("Veículo não encontrado!");
            }
        } catch(Exception $e){
            echo "Erro ao buscar dados: ".$e->getMessage();
        }
    } else {
        die("ID não fornecido!");
    }
?>

<h1>Confirmar Exclusão</h1>
<p>Tem certeza que deseja excluir o seguinte veículo?</p>

<?php
    if(isset($_GET['erro']) && $_GET['erro'] == 'constraint') {
        echo "<p class='alert alert-danger'>
            <b>Erro:</b> Este veículo não pode ser excluído, pois está sendo usado em um ou mais registros de viagem.
        </p>";
    }
?>

<form method="post">
    <input type="hidden" name="id" value="<?= $veiculo['id'] ?>">

    <div class="mb-3">
        <label for="placa" class="form-label">Placa</label>
        <input type="text" id="placa" name="placa" class="form-control" 
               value="<?= $veiculo['placa'] ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="modelo" class="form-label">Modelo</label>
        <input type="text" id="modelo" name="modelo" class="form-control" 
               value="<?= $veiculo['modelo'] ?>" disabled>
    </div>
    <div class="mb-3">
        <label for="tipo_nome" class="form-label">Tipo</label>
        <input type="text" id="tipo_nome" name="tipo_nome" class="form-control" 
               value="<?= $veiculo['tipo_nome'] ?>" disabled>
    </div>
    
    <a href="veiculos.php" class="btn btn-secondary">Voltar</a>
    <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
</form>

<?php
    require("rodape.php");
?>
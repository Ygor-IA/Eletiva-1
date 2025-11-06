<?php
    require("cabecalho.php");
    require("conexao.php");
    
    // Lógica para carregar os dados existentes (GET)
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        try{
            // Busca o veículo específico
            $stmt_veiculo = $pdo->prepare("SELECT * FROM veiculo WHERE id = ?");
            $stmt_veiculo->execute([$id]);
            $veiculo = $stmt_veiculo->fetch(PDO::FETCH_ASSOC);
            
            if(!$veiculo){
                die("Veículo não encontrado!");
            }
            
            // Busca todos os tipos para o dropdown
            $stmt_tipos = $pdo->query("SELECT * FROM tipo_veiculo");
            $tipos_veiculo = $stmt_tipos->fetchAll();

        } catch(Exception $e){
            echo "Erro ao buscar dados: ".$e->getMessage();
        }
    }

    // Lógica para atualizar os dados (POST)
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        $placa = $_POST['placa'];
        $modelo = $_POST['modelo'];
        $ano = $_POST['ano'];
        $tipo_id = $_POST['tipo_id'];
        
        try{
            $stmt = $pdo->prepare("
                UPDATE veiculo SET placa = ?, modelo = ?, ano = ?, tipo_veiculo_id = ? 
                WHERE id = ?
            ");
            if($stmt->execute([$placa, $modelo, $ano, $tipo_id, $id])){
                header("location: veiculos.php?editar=true");
            }else{
                header("location: veiculos.php?editar=false");
            }
        } catch(Exception $e){
            echo "Erro ao atualizar: ".$e->getMessage();
        }
    }

?>

<h1>Editar Veículo (RF1)</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $veiculo['id'] ?>">

    <div class="mb-3">
        <label for="placa" class="form-label">Placa</label>
        <input type="text" id="placa" name="placa" class="form-control" 
               value="<?= $veiculo['placa'] ?>" required="">
    </div>
    <div class="mb-3">
        <label for="modelo" class="form-label">Modelo</label>
        <input type="text" id="modelo" name="modelo" class="form-control" 
               value="<?= $veiculo['modelo'] ?>" required="">
    </div>
    <div class="mb-3">
        <label for="ano" class="form-label">Ano</label>
        <input type="number" id="ano" name="ano" class="form-control" min="1950" max="2100" 
               value="<?= $veiculo['ano'] ?>" required="">
    </div>
    <div class="mb-3">
        <label for="tipo_id" class="form-label">Tipo de Veículo</label>
        <select id="tipo_id" name="tipo_id" class="form-select" required="">
            <option value="">-- Selecione --</option>
            <?php foreach ($tipos_veiculo as $t): ?>
                <?php $selected = ($t['id'] == $veiculo['tipo_veiculo_id']) ? 'selected' : ''; ?>
                <option value="<?= $t['id'] ?>" <?= $selected ?>>  
                    <?= $t['nome'] ?>  
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
</form>

<?php
    require("rodape.php");
?>